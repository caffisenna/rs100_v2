<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class entryForm
 * @package App\Models
 * @version August 24, 2021, 9:13 pm JST
 *
 * @property string $furigana
 * @property string $bs_id
 * @property string $district
 * @property string $dan_name
 * @property string $dan_number
 * @property string $birth_day
 * @property string $gender
 * @property string $zip
 * @property string $address
 * @property string $telephone
 * @property string $cellphone
 * @property string $50km_exp
 * @property string $parent_name
 * @property string $parent_name_furigana
 * @property string $parent_relation
 * @property string $emer_phone
 * @property string $sm_name
 * @property string $sm_position
 */
class entryForm extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'entry_forms';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'furigana',
        'bs_id',
        'district',
        'dan_name',
        'dan_number',
        'birth_day',
        'gender',
        'zip',
        'address',
        'telephone',
        'cellphone',
        'exp_50km',
        'parent_name',
        'parent_name_furigana',
        'parent_relation',
        'emer_phone',
        'sm_name',
        'sm_position',
        'uuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'furigana' => 'string',
        'bs_id' => 'string',
        'district' => 'string',
        'dan_name' => 'string',
        'dan_number' => 'string',
        'birth_day' => 'date',
        'gender' => 'string',
        'zip' => 'string',
        'address' => 'string',
        'telephone' => 'string',
        'cellphone' => 'string',
        'exp_50km' => 'string',
        'parent_name' => 'string',
        'parent_name_furigana' => 'string',
        'parent_relation' => 'string',
        'emer_phone' => 'string',
        'sm_name' => 'string',
        'sm_position' => 'string',
        'uuid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'furigana' => 'required',
        'bs_id' => 'required',
        'district' => 'required',
        'dan_name' => 'required',
        'dan_number' => 'required',
        'birth_day' => 'required',
        'gender' => 'required',
        'zip' => 'required',
        'address' => 'required',
        'telephone' => 'required',
        'cellphone' => 'required',
        'exp_50km' => 'required',
        'parent_name' => 'required',
        'parent_name_furigana' => 'required',
        'parent_relation' => 'required',
        'emer_phone' => 'required',
        'sm_name' => 'required',
        'sm_position' => 'required'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
