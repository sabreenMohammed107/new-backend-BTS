<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCenter extends Model
{
    use HasFactory;
    protected $table = "download_centers";
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
