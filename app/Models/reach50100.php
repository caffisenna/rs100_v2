<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class reach50100
 * @package App\Models
 * @version October 19, 2021, 10:27 pm JST
 *
 * @property string $user_id
 * @property string $reach50
 * @property string $reach100
 */
class reach50100 extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'reach50100s';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'reach50',
        'reach100'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'reach50' => 'datetime',
        'reach100' => 'datetime'
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
