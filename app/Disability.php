<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description'
    ];

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
