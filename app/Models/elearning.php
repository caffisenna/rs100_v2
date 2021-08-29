<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class elearning
 * @package App\Models
 * @version August 24, 2021, 11:52 pm JST
 *
 */
class elearning extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'elearnings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        // 'q1' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'q1' => 'in:1|required',
        'q2' => 'in:3|required'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
