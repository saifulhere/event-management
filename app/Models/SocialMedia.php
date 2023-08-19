<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id', 'facebook', 'instagram', 'twitter', 'linkedin'
    ];

    public function organizer ()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function event ()
    {
        return $this->belongsTo(Event::class);
    }
}
