<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Thread;
use Illuminate\Auth\AuthenticationException;

class CreateThreadsTest extends TestCase
{
    /** @test */
    public function guests_may_not_create_threads()
    {
        $this->expectException(AuthenticationException::class);

        $thread = make(Thread::class);

        $this->post('/threads', $thread->toArray()); 
    }

    /** @test */
    public function guests_cannot_see_the_create_thread_page()
    {
        $this->withExceptionHandling();

        $this->get('/threads/create')
            ->assertRedirect('/login');
    }
    /** @test */
    public function an_authenticated_user_can_create_forum_threads ()
    {
        // Given we have a signed in user
        $this->signIn();

        // When we hit the endpoint to create a new thread
        $thread = make(Thread::class);

        $this->post('/threads', $thread->toArray());

        // Then, when we visit the thread page.
        $response = $this->get($thread->path());

        // We should see the new thread
        $response->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
