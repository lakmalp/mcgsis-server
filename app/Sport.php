<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sport_id',
        'description',
        'teacher_incharge_id',
        'master_coach',
        'sub_coach',
        'physio',
        'master_coach_wage',
        'sub_coach_wage',
        'annual_allocated_budget'
    ];

    public function teacherInCharge()
    {
        return $this->belongsTo('App\Teacher', 'teacher_incharge_id');
    }

    public function students_i()
    {
        return $this->hasMany('App\Student', 'sport_id_1');
    }

    public function students_2()
    {
        return $this->hasMany('App\Student', 'sport_id_2');
    }

    public function students_3()
    {
        return $this->hasMany('App\Student', 'sport_id_3');
    }
}
