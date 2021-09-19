<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class planUpload
 * @package App\Models
 * @version August 30, 2021, 11:32 pm JST
 *
 * @property string $user_id
 * @property string $time
 * @property string $distance
 * @property string $image_path
 * @property file $image
 */
class planUpload extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'plan_uploads';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'file_path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'file_path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'file' => 'required|mimes:pdf,docx,xlsx,jpg',
    ];

    public static $messages = [
        'file.required'=>'計画書のファイルを指定してください',
        'file.mimes'=>'計画書はPDF、エクセル、ワード、またはjpg形式のみアップロード可能です',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
