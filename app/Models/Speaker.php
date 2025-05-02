<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'salut_id', 'first_name', 'last_name', 'email', 'address',
        'country_id', 'venue_id', 'phone', 'mobile', 'other_data',
        'cv_path', 'doc_path'
    ];

    protected $casts = [
        'expertise' => 'array',
    ];

    public function salut()
    {
        return $this->belongsTo('App\Models\ApplicantSalut', 'salut_id');
    }

    public function expertises()
    {
        return $this->belongsToMany(Expertise::class, 'speakers_expertises', 'speaker_id', 'expertise_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');

    }
    public function venue()
    {
        return $this->belongsTo('App\Models\Venue','venue_id');

    }

    public function course()
    {
        return $this->belongsToMany('App\Models\TeachCourse','speaker_courses','speaker_id','course_id');
    }
}
