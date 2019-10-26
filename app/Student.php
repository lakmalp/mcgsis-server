<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'house_id',
        'grade_class',
        'city',
        'gnd',
        'sport_id_1',
        'sport_id_2',
        'sport_id_3',
        'is_scholar',
        'is_special_need',
        'disability_id'
    ];

    public function disability()
    {
        return $this->belongsTo('App\Disability');
    }

    public function house()
    {
        return $this->belongsTo('App\House');
    }

    public function sport_1()
    {
        return $this->belongsTo('App\Sport');
    }

    public function sport_2()
    {
        return $this->belongsTo('App\Sport');
    }

    public function sport_3()
    {
        return $this->belongsTo('App\Sport');
    }
}
