<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class resultInputs
 * @package App\Models
 * @version October 17, 2021, 10:11 am JST
 *
 * @property string $user_id
 * @property integer $day
 * @property string $distance
 * @property time $time
 */
class resultInputs extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'result_inputs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'day',
        'distance',
        'time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'day' => 'integer',
        'distance' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'day' => 'required',
        'distance' => 'required',
        'time' => 'required',
    ];

    public static $messages = [
        'day.required'=>'歩行日を選択してください',
        'distance.required'=>'距離を入力して下さい',
        'time.required'=>'歩行時間を入力して下さい',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
