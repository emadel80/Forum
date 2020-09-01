<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Auth\AuthenticationException;

class ParticipateInForumTest extends TestCase
{
    // /** @test */
    // public function an_unauthenticated_user_may_not_add_replies()
    // {
    //     $this->withExceptionHandling()
    //         ->post(route('reply.store'), [])
    //         ->assertRedirect('/login');
    // }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->signIn(create(User::class));
        $thread = create(Thread::class);
        $reply  = create(Reply::class);

        $this->post(url($thread->path() . '/replies'), $reply->toArray());
        // $this->get($thread->path())->assertSee($reply->body);
    }
}
