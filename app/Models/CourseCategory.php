<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $fillable = [
        'category_en_name',
        'category_en_description',
        'category_image',
        'active'
    ];

    protected $casts = [
        'active' => 'integer'
    ];

    public function courseSubCategories()
    {
        return $this->hasMany('App\Models\CourseSubCategory','course_category_id','id');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'course_category_id', 'id');
    }

    // Accessor for backward compatibility
    public function getNameEnAttribute()
    {
        return $this->category_en_name;
    }

    public function getDescriptionEnAttribute()
    {
        return $this->category_en_description;
    }

    public function getImageAttribute()
    {
        return $this->category_image;
    }
}
