<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AdminConfig
 * @package App\Models
 * @version August 16, 2021, 8:33 pm JST
 *
 * @property string $create_account
 * @property string $create_application
 * @property string $elearning
 * @property string $healthcheck
 * @property string $user_edit
 * @property string $car_registration
 */
class AdminConfig extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'admin_configs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'create_account',
        'create_application',
        'elearning',
        'healthcheck',
        'user_edit',
        'car_registration',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'create_account' => 'string',
        'create_application' => 'string',
        'elearning' => 'string',
        'healthcheck' => 'string',
        'user_edit' => 'string',
        'car_registration' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];
}
