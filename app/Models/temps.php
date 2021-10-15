<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class temps
 * @package App\Models
 * @version October 14, 2021, 8:28 pm JST
 *
 * @property string $user_id
 * @property string $temp1_day1_before
 * @property string $temp1_day1_after
 * @property string $temp1_day2_before
 * @property string $temp1_day3_after
 */
class temps extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'temps';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'temp_day1_before',
        'temp_day1_after',
        'temp_day2_before',
        'temp_day2_after'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'temp1_day1_before' => 'string',
        'temp1_day1_after' => 'string',
        'temp1_day2_before' => 'string',
        'temp1_day2_after' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'user_id' => 'required',
        // 'temp1_day1_before' => 'required',
        // 'temp1_day1_after' => 'required',
        // 'temp1_day2_before' => 'required',
        // 'temp1_day3_after' => 'required'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
