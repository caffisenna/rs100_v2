<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car_registration extends Model
{
    public $table = 'car_registrations';

    public $fillable = [
        'driver_name',
        'cell_phone',
        'email',
        'district',
        'dan_name',
        'position',
        'relation',
        'car_number',
        'uuid',
    ];

    protected $casts = [
        'id' => 'integer',
        'driver_name' => 'string',
        'cell_phone' => 'string',
        'email' => 'string',
        'district' => 'string',
        'dan_name' => 'string',
        'position' => 'string',
        'relation' => 'string',
        'car_number' => 'string',
        'uuid' => 'string',
    ];

    public static array $rules = [
        'driver_name' => 'required',
        'cell_phone' => 'required',
        'email' => 'required',
        'district' => 'required',
        'dan_name' => 'required',
        'position' => 'required',
        'relation' => 'required',
        'car_number' => 'required',
        'uuid' => 'required',
    ];


}
