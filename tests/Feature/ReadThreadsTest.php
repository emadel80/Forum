<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;

class ThreadsTest extends TestCase
{
    protected $thread;

    protected function setUp() : void
    {
        parent::setUp();

        $this->thread = create(Thread::class);
        $this->user = create(User::class);
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $this->signIn($this->user);
        $this->get('/threads')->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_a_single_thread()
    {
        $this->signIn($this->user);
        $this->get($this->thread->path())->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $this->signIn($this->user);

        $reply = create(Reply::class, ['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())->assertSee($reply->body);
    }
}
