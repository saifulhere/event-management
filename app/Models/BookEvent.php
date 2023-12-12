<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class BookEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'guest_id', 'name', 'email', 'phone', 'image', 'number_of_people', 'payment_status',
        'payment_method', 'trxn_id', 'payment_number', 'payment_id', 'amount'
    ];

    public function event ()
    {
        return $this->belongsTo(Event::class);
    }
}
