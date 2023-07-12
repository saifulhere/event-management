<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BookEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'age', 'passing_year', 'quantity', 'payment_status', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
