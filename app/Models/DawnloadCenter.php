<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DawnloadCenter extends Model
{
    use HasFactory;
    protected $table = "dawnload_centers";
    protected $fillable = [
        'title',
        'description',
        'image',
        'upload_file',
        'file_size',
        'file_extention',
        'active',
    ];
}
