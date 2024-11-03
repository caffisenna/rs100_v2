<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    public $table = 'updates';

    public $fillable = [
        'body'
    ];

    protected $casts = [
        'id' => 'integer',
        'body' => 'string'
    ];

    public static array $rules = [
        'body' => 'required'
    ];


}
