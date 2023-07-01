<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\About;

class Features extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id', 'feature'
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
