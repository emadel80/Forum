<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;

class ParticipateInForumTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();

        $this->user = create(User::class);
        $this->reply = make(Reply::class);
    }

    /** @test */
    public function an_unauthenticated_user_may_not_add_replies()
    {
        $this->withExceptionHandling()
            ->post($this->reply->path(), [])
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->signIn($this->user);

        $this->post($this->reply->path(), $this->reply->toArray());
        $this->get($this->reply->thread->path())->assertSee($this->reply->body);
    }

    /** @test */
    public function a_reply_requires_a_body()
    {
        $this->withExceptionHandling()->signIn();

        $reply = make(Reply::class, ['body' => null]);

        $this->post($reply->path(), $reply->toArray())
            ->assertSessionHasErrors('body');

    }
}
