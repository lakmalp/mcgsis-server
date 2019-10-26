<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_initials',
        'f_surname',
        'f_contact_no',
        'f_occupation',
        'f_work_place',
        'm_initials',
        'm_surname',
        'm_contact_no',
        'm_occupation',
        'm_work_place',
        'g_initials',
        'g_surname',
        'g_contact_no',
        'is_old_boy',
        'total_donations',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
