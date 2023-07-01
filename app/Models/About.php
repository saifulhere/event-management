<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Features;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'sub_heading', 'heading', 'btn_url'
    ];

    public function features()
    {
        return $this->hasMany(Features::class);
    }
}
