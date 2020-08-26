<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Reply;

use Tests\TestCase;

class ReplyTest extends TestCase
{
    /** @test */
    public function it_has_an_owner()
    {
        $reply = create(Reply::class);

        $this->assertInstanceOf(User::class, $reply->owner);    
    }
}
