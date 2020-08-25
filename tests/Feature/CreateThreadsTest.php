<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function guests_may_not_create_threads()
    {
        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);

        $thread = factory(Thread::class)->make();

        $this->post('/threads', $thread->toArray()); 
    }

    /** @test */
    public function an_authenticated_user_can_create_forum_threads ()
    {
        $this->withoutExceptionHandling();

        // Given we have a signed in user
        $user =$this->actingAs(factory(User::class)->create());

        // When we hit the endpoint to create a new thread
        $thread = factory(Thread::class)->make();

        $this->post('/threads', $thread->toArray());

        // Then, when we visit the thread page.
        $response = $this->get($thread->path());

        // We should see the new thread
        $response->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
