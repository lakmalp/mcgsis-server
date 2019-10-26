<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'gender',
        'class',
        'qualification',
        'date_of_appointment',
        'service',
        'prev_school_id'
    ];

    public function previousSchool()
    {
        return $this->belongsTo('App\School', 'prev_school_id');
    }
}
