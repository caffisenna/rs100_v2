<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'is_commi',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user() {
        // return $this->hasOne(entryForm::class);
        return $this->hasOne(elearning::class);
    }

    public function entryform() {
        return $this->hasOne(entryForm::class);
    }

    public function resultupload() {
        return $this->hasMany(resultUpload::class);
    }

    public function planupload() {
        return $this->hasMany(planUpload::class);
    }

    public function status() {
        return $this->hasOne(status::class);
    }

    public function temps() {
        return $this->hasOne(temps::class);
    }

    public function resultinputs() {
        return $this->hasOne(resultinputs::class);
    }

    public function reach50100() {
        return $this->hasOne(reach50100::class);
    }
}
