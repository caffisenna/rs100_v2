<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Buddylist
 * @package App\Models
 * @version September 30, 2022, 3:21 pm JST
 *
 * @property integer $person1
 * @property integer $person2
 * @property integer $person3
 * @property integer $person4
 * @property integer $person5
 * @property string $confirmed
 */
class Buddylist extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'buddylists';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'person1',
        'person2',
        'person3',
        'person4',
        'person5',
        'confirmed'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'person1' => 'integer',
        'person2' => 'integer',
        'person3' => 'integer',
        'person4' => 'integer',
        'person5' => 'integer',
        'confirmed' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'person1' => 'required',
        'person2' => 'required',
        'person3' => 'nullable',
        'person4' => 'nullable',
        'person5' => 'nullable',
        'confirmed' => 'nullable'
    ];


}
