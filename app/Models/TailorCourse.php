<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TailorCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    'city',
    'description',
    'course_date',
    'name',
    'email',
    'mobile',
    'company',
    ];
}
