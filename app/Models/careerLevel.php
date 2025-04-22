<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class careerLevel extends Model
{
    protected $table = 'career_levels';
    protected $fillable = [
        'level', 'active'
    ];

    public function applicants()
    {
        return $this->hasMany(CareersApplicant::class, 'carrer_level_id', 'id');
    }
}
