<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{

    use HasFactory;
     protected $table ="home_sliders";
    protected $fillable = [
        'en_head_title',
        'en_title',
        'description',
        'image',
        'rank',
        'active',
    ];
}
