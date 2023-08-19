<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Event;
use App\Models\SocialMedia;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'tagline', 'about', 'phone', 'email', 'image'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function event ()
    {
        return $this->hasMany(Event::class);
    }

    public function socialMedia ()
    {
        return $this->hasMany(SocialMedia::class);
    }

}
