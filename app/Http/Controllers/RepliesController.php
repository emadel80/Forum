<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Channel;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }
    
    public function store(Channel $channel, Thread $thread)
    {
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
