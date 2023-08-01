<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organizer;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id',
        'start_date',
        'end_date',
        'title',
        'location',
        'booking_start',
        'booking_end'
    ];

    public function organizer ()
    {
        return $this->belongsTo(Organizer::class);
    }
}
