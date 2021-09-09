<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class resultUpload
 * @package App\Models
 * @version August 30, 2021, 11:32 pm JST
 *
 * @property string $user_id
 * @property string $time
 * @property string $distance
 * @property string $image_path
 * @property file $image
 */
class resultUpload extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'result_uploads';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'date',
        'time',
        'distance',
        'image_path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'user_id' => 'string',
        'time' => 'string',
        'distance' => 'string',
        'image_path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'image' => 'required',
    ];

    public static $messages = [
        'image.required'=>'TATTAの記録画面を選択してください',
    ];


}
