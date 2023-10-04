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
 * @property string $prefecture
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
 * @property string $memo
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
        'prefecture',
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
        'uuid',
        'bs_gs',
        'buddy_ok',
        'buddy_match',
        'buddy1_name',
        'buddy1_dan',
        'buddy2_name',
        'buddy2_dan',
        'buddy_type',
        'memo',
        'generation',
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
        'prefecture' => 'string',
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
        'uuid' => 'string',
        'bs_gs' => 'string',
        'buddy_ok' => 'string',
        'buddy_match' => 'string',
        'buddy1_name' => 'string',
        'buddy1_dan' => 'string',
        'buddy2_name' => 'string',
        'buddy2_dan' => 'string',
        'buddy_type' => 'string',
        'memo' => 'string',
        'generation' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'furigana' => 'required',
        'user_id' => 'unique',
        'bs_gs' => 'required',
        'bs_id' => 'required_if:bs_gs,BS',
        'prefecture' => 'required',
        'district' => 'required',
        'dan_name' => 'required',
        'bd_year' => 'integer|between:1953,2005',
        'bd_month' => 'integer|between:1,12',
        'bd_day' => 'integer|between:1,31',
        'gender' => 'required',
        'zip' => 'required|digits:7',
        'address' => 'required',
        'telephone' => 'required',
        'cellphone' => 'required|digits:11',
        'exp_50km' => 'required',
        'parent_name' => 'required',
        'parent_name_furigana' => 'required',
        'parent_relation' => 'required',
        'emer_phone' => 'required',
        'sm_name' => 'required',
        'sm_position' => 'required',
        'buddy_ok' => 'required_if:gender,男',
        'buddy_match' => 'required_if:gender,女',
        'buddy1_name' => 'required_if:buddy_match,男性バディが決まっている',
        'buddy1_dan' => 'required_if:buddy_match,男性バディが決まっている',
        'buddy2_dan' => 'required_with:buddy2_name',
        'buddy_type' => 'required',
        'generation' => 'required',
    ];

    // ここにカスタムエラーメッセージを定義する
    // viewの方の該当箇所に {{ $message }} を入れると拾ってくれる
    public static $messages = [
        'furigana.required' => '入力必須です',
        'user_id.unique' => '既に申込が行われています。重複して申し込みデータを作成することはできません。',
        'bs_gs.required' => '所属を選択してください',
        'bs_id.required_if' => '登録証を確認してください',
        // 'bs_id.digits'=>'加盟登録番号(10桁)を登録証で確認してください',
        'prefecture.required' => '所属県連盟を入力してください',
        'zip.required' => '郵便番号を入力してください',
        'zip.digits' => '郵便番号は7桁の半角数字で入力してください',
        'bd_year.integer' => '生まれ年を選択してください',
        'bd_year.between' => '生まれ年を1953年〜2005年の間で選択してください',
        'bd_month.integer' => '生まれ月を整数(1-12)で入力してください',
        'bd_month.between' => '生まれ月を整数(1-12)で入力してください',
        'bd_day.integer' => '生まれ日を整数(1-31)で入力してください',
        'bd_day.between' => '生まれ日を整数(1-31)で入力してください',
        'gender.required' => '性別を選択してください',
        'address.required' => '入力必須です(番地まで正確に)',
        'telephone.required' => '入力必須です',
        'cellphone.required' => '入力必須です',
        'cellphone.digits' => 'ケータイはハイフンなしの11桁で入力してください',
        'exp_50km.required' => '選択してください',
        'district.required' => '入力必須です',
        'dan_name.required' => '入力必須です',
        'parent_name.required' => '氏名を入力してください',
        'parent_name_furigana.required' => 'ふりがなを入力してください',
        'parent_relation.required' => '続柄を入力してください',
        'emer_phone.required' => '電話番号を入力してください',
        'sm_name.required' => '氏名を入力してください',
        'sm_position.required' => '役務を選択してください',
        'buddy_ok.required_if' => 'バディ要請の可否を選択してください',
        'buddy_match.required_if' => 'バディ紹介希望の有無を選択してください',
        'buddy1_name.required_if' => '男性バディの氏名を入力してください',
        'buddy1_dan.required_if' => '男性バディの所属団を入力してください',
        'buddy2_dan.required_with' => 'バディ2の団名を入力してください',
        'buddy_type.required' => 'バディのタイプを選択してください',
        'generation.required' => '現役スカウトもしくはオーバーエイジを選択してください',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
