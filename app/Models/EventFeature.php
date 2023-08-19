<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class EventFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'feature'
    ];

    public function event ()
    {
        return $this->belongsTo(Event::class);
    }
}
