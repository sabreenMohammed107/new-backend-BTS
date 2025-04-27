<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'salutation', 'first_name', 'last_name', 'email', 'address',
        'country', 'city', 'phone', 'mobile', 'other_data',
        'cv_path', 'doc_path', 'expertise'
    ];

    protected $casts = [
        'expertise' => 'array',
    ];
}
