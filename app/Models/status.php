<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class status
 * @package App\Models
 * @version September 26, 2021, 3:36 pm JST
 *
 * @property string $user_id
 * @property string $day1_start_time
 * @property string $day1_end_time
 * @property string $day2_start_time
 * @property string $day2_end_time
 * @property string $reach_50km_time
 * @property string $reach_100km_time
 * @property string $day1_distance
 * @property string $day2_distance
 */
class status extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'statuses';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'day1_start_time',
        'day1_end_time',
        'day2_start_time',
        'day2_end_time',
        'day1_retire' => 'datetime',
        'day2_retire' => 'datetime',
        'whole_retire' => 'datetime',
        'reach_50km_time',
        'reach_100km_time',
        'day1_distance',
        'day2_distance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'day1_start_time' => 'datetime',
        'day1_end_time' => 'datetime',
        'day2_start_time' => 'datetime',
        'day2_end_time' => 'datetime',
        'day1_retire' => 'datetime',
        'day2_retire' => 'datetime',
        'whole_retire' => 'datetime',
        // 'reach_50km_time' => 'datetime',
        // 'reach_100km_time' => 'datetime',
        'day1_distance' => 'string',
        'day2_distance' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
