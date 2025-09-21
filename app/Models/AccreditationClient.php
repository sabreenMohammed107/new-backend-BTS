<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditationClient extends Model
{
    use HasFactory;
      protected $fillable = [
        'client_name', 'client_logo_url','client_website','active'
    ];
}
