<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Organizer;
use App\Models\BookEvent;
use App\Models\EventFeature;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'organizer_id', 'title', 'slug', 'tagline', 'description', 'location',
        'thumbnail', 'start_date', 'end_date', 'booking_start', 'booking_end'
    ];

    
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function organizer ()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function bookEvent ()
    {
        return $this->hasMany(BookEvent::class);
    }

    public function features ()
    {
        return $this->hasMany(EventFeature::class);
    }

    public function eventGuests()
    {
        return $this->hasMany(EventGuest::class);
    }

}
