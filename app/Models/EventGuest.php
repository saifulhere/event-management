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
        'event_id', 'organizer_id', 'name', 'designation', 'about'
    ];

    public function event ()
    {
        return $this->belongsTo(Event::class);
    }

    public function organizer ()
    {
        return $this->belongsTo(Organizer::class);
    }
}
