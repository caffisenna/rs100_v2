<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addUsers extends Model
{
    public $table = 'add_users';

    public $fillable = [
        'name',
        'email',
        'role',
        'district',
        'password'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'role' => 'string',
        'district' => 'string',
        'password' => 'string'
    ];

    public static array $rules = [
        'name' => 'required',
        'email' => 'required',
        'role' => 'required',
        'password' => 'required'
    ];

    
}
