<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
 
    protected $thread;

    public function setUp() : void
    {
        parent::setUp();

        $this->thread = factory(Thread::class)->create();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_user_can_access_the_threads_page()
    {
        $this->get('/threads')->assertStatus(200);
    }

    /** @test */
    public function an_authenticated_user_can_view_all_threads()
    {
        $this->be($this->user);
        $this->get('/threads')->assertSee($this->thread->title);
    }

    /** @test */
    public function an_unauthenticated_user_can_read_a_single_thread()
    {
        $this->be($this->user);
        $this->get($this->thread->path())->assertSee($this->thread->title);
    }

    /** @test */
    public function an_authenticated_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $this->be($this->user);

        $reply = factory(Reply::class)->create(['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())->assertSee($reply->body);
    }

    /** @test */
    public function a_thread_has_replies()
    {
        $this->assertInstanceOf(Collection::class, $this->thread->replies);
    }

    /** @test */
    public function a_thread_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->thread->creator);
    }

    /** @test */
    public function a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => 'Foobar',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }

}
