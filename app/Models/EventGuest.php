<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Organizer;

class EventGuest extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'organizer_id', 'name', 'designation', 'about', 'profile'
    ];

    public function events ()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function organizer ()
    {
        return $this->belongsTo(Organizer::class);
    }
}
