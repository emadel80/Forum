<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Channel;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }
    
    public function store(Request $request, Channel $channel, Thread $thread)
    {
        $this->validate($request, ['body' => 'required']);

        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
