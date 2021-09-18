<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class entryForm
 * @package App\Models
 * @version August 24, 2021, 9:13 pm JST
 *
 * @property string $furigana
 * @property string $bs_id
 * @property string $district
 * @property string $dan_name
 * @property string $birth_day
 * @property string $gender
 * @property string $zip
 * @property string $address
 * @property string $telephone
 * @property string $cellphone
 * @property string $50km_exp
 * @property string $parent_name
 * @property string $parent_name_furigana
 * @property string $parent_relation
 * @property string $emer_phone
 * @property string $sm_name
 * @property string $sm_position
 */
class entryForm extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'entry_forms';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'furigana',
        'bs_id',
        'district',
        'dan_name',
        'birth_day',
        'gender',
        'zip',
        'address',
        'telephone',
        'cellphone',
        'exp_50km',
        'parent_name',
        'parent_name_furigana',
        'parent_relation',
        'emer_phone',
        'sm_name',
        'sm_position',
        'uuid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'furigana' => 'string',
        'bs_id' => 'string',
        'district' => 'string',
        'dan_name' => 'string',
        'birth_day' => 'date',
        'gender' => 'string',
        'zip' => 'string',
        'address' => 'string',
        'telephone' => 'string',
        'cellphone' => 'string',
        'exp_50km' => 'string',
        'parent_name' => 'string',
        'parent_name_furigana' => 'string',
        'parent_relation' => 'string',
        'emer_phone' => 'string',
        'sm_name' => 'string',
        'sm_position' => 'string',
        'uuid' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'furigana' => 'required',
        'bs_id' => 'required|digits:10',
        'district' => 'required',
        'dan_name' => 'required',
        'bd_year' => 'integer|between:1996,2003',
        'bd_month' => 'integer|between:1,12',
        'bd_day' => 'integer|between:1,31',
        'gender' => 'required',
        'zip' => 'required|digits:7',
        'address' => 'required',
        'telephone' => 'required',
        'cellphone' => 'required',
        'exp_50km' => 'required',
        'parent_name' => 'required',
        'parent_name_furigana' => 'required',
        'parent_relation' => 'required',
        'emer_phone' => 'required',
        'sm_name' => 'required',
        'sm_position' => 'required'
    ];

    // ここにカスタムエラーメッセージを定義する
    // viewの方の該当箇所に {{ $message }} を入れると拾ってくれる
    public static $messages= [
        'furigana.required' => '入力必須です',
        'bs_id.required' => '登録証を確認してください',
        'bs_id.digits'=>'10桁の登録番号を登録証で確認してください',
        'zip.required'=>'必須',
        'zip.digits'=>'7桁の半角数字で入力してください',
        'bd_year.integer'=>'生まれ年を整数(1996-2003)で入力してください',
        'bd_year.between'=>'生まれ年を整数(1996-2003)で入力してください',
        'bd_month.integer'=>'生まれ月を整数(1-12)で入力してください',
        'bd_month.between'=>'生まれ月を整数(1-12)で入力してください',
        'bd_day.integer'=>'生まれ日を整数(1-31)で入力してください',
        'bd_day.between'=>'生まれ日を整数(1-31)で入力してください',
        'gender.required' => '性別を選択してください',
        'address.required' => '入力必須です(番地まで正確に)',
        'telephone.required'=>'入力必須です',
        'cellphone.required'=>'入力必須です',
        'exp_50km.required'=>'選択してください',
        'district.required'=>'選択してください',
        'dan_name.required'=>'選択してください',
        'parent_name.required'=>'入力してください',
        'parent_name_furigana.required'=>'入力してください',
        'parent_relation.required'=>'入力してください',
        'emer_phone.required'=>'入力してください',
        'sm_name.required'=>'入力してください',
        'sm_position.required'=>'選択してください',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
