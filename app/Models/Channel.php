<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['channel_id'];

    public function path()
    {
        return "/threads/{$this->slug}";
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
