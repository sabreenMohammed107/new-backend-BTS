<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeakerCourse extends Model
{
    protected $fillable = [
        'speaker_id','course_id'
    ];
    public function course()
    {
        return $this->belongsTo('App\Models\TeachCourse','course_id');

    }

}
