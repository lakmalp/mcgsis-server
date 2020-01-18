<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use TeamTNT\TNTSearch\Indexer\TNTIndexer;

class Student extends Model
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_names',
        'surname',
        'dob',
        'date_of_admission',
        'house_id',
        'grade_class',
        'city',
        'gnd',
        'sport_id_1',
        'sport_id_2',
        'sport_id_3',
        'is_scholar',
        'is_special_need',
        'disability_id',
        'ol_mahindian',
        'olevel_nine_a',
        'grade_5_mahindian',
        'grade_5_passed',
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

    public function searchableAs()
    {
        return 'students_index';
    }

    public function toSearchableArray()
    {
        // $array = $this->toArray();
        $array =  [
            'id' => $this->id,
            // 'first_names' => utf8_encode((new TNTIndexer)->buildTrigrams($this->first_names)),
            // 'surname' => utf8_encode((new TNTIndexer)->buildTrigrams($this->surname)),
            'first_names' => $this->first_names,
            'surname' => $this->surname,
            'dob' => $this->dob,
            'date_of_admission' => $this->date_of_admission,
            'house_id' => $this->house_id,
            'grade_class' => $this->grade_class,
            'city' => $this->city,
            'gnd' => $this->gnd,
            'sport_id_1' => $this->sport_id_1,
            'sport_id_2' => $this->sport_id_2,
            'sport_id_3' => $this->sport_id_3,
            'is_scholar' => $this->is_scholar,
            'is_special_need' => $this->is_special_need,
            'disability_id' => $this->disability_id,
            'ol_mahindian' => $this->ol_mahindian,
            'olevel_nine_a' => $this->olevel_nine_a,
            'grade_5_mahindian' => $this->grade_5_mahindian,
            'grade_5_passed' => $this->grade_5_passed
        ];

        // $array['sport_id_1'] = $this->sport_1['description'];

        return $array;
    }
}
