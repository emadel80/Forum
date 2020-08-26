<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Auth\AuthenticationException;

class ParticipateInForumTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();

        $this->user = create(User::class);
        $this->thread = create(Thread::class);
        $this->reply = make(Reply::class);
    }

    /** @test */
    public function an_unauthenticated_user_may_not_add_replies()
    {
        $this->expectException(AuthenticationException::class);
        $this->post('/threads/1/replies', []);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->signIn($this->user);

        $this->post(url($this->thread->path() . '/replies'), $this->reply->toArray());
        $this->get($this->thread->path())->assertSee($this->reply->body);
    }
}
