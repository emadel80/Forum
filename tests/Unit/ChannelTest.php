<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Thread;
use App\Models\Channel;

class ChannelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */
    public function a_channel_consists_of_threads()
    {
        $channel = create(Channel::class);
        $thread = create(Thread::class, ['channel_id' => $channel->id]);
        
        $this->assertTrue($channel->threads->contains($thread));
    }
}
