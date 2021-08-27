<!-- Furigana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('furigana', 'ふりがな:') !!}
    {!! Form::text('furigana', null, ['class' => 'form-control']) !!}
</div>

<!-- Bs Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bs_id', '登録番号:') !!}
    {!! Form::text('bs_id', null, ['class' => 'form-control']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', '地区:') !!}
    {!! Form::select('district', [
    '大都心' => '大都心',
    'さくら' => 'さくら',
    '城東' => '城東',
    '山手' => '山手',
    'つばさ' => 'つばさ',
    '世田谷' => '世田谷',
    'あすなろ' => 'あすなろ',
    '城北' => '城北',
    '練馬' => '練馬',
    '多摩西' => '多摩西',
    '新多磨' => '新多磨',
    '南武蔵野' => '南武蔵野',
    '町田' => '町田',
    '北多摩' => '北多摩'
    ], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Dan Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dan_name', '団名:') !!}
    {!! Form::text('dan_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Dan Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dan_number', '団番号:') !!}
    {!! Form::text('dan_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Birth Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_day', '生年月日:') !!}
    {!! Form::text('birth_day', null, ['class' => 'form-control', 'id' => 'birth_day']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#birth_day').datepicker({
            format: 'yyyy-mm-dd',
            useCurrent: true,
            sideBySide: true,
            language: 'ja',
            autoclose: true
        })
    </script>
@endpush

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', '性別:') !!}
    {!! Form::select('gender', ['男' => '男', '女' => '女'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Zip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zip', '郵便番号:') !!}
    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', '住所:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', '電話番号(自宅):') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Cellphone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cellphone', 'ケータイ番号:') !!}
    {!! Form::text('cellphone', null, ['class' => 'form-control']) !!}
</div>

<!-- 50Km Exp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exp_50km_exp', '50kmハイクの経験:') !!}
    {!! Form::select('exp_50km', ['あり' => 'あり', 'なし' => 'なし'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Parent Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_name', '保護者氏名:') !!}
    {!! Form::text('parent_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Name Furigana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_name_furigana', '保護者ふりがな:') !!}
    {!! Form::text('parent_name_furigana', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Relation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_relation', '保護者続柄:') !!}
    {!! Form::text('parent_relation', null, ['class' => 'form-control']) !!}
</div>

<!-- Emer Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emer_phone', '緊急連絡先電話番号:') !!}
    {!! Form::text('emer_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Sm Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sm_name', '隊長もしくは団委員長氏名:') !!}
    {!! Form::text('sm_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Sm Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sm_position', '役務:') !!}
    {!! Form::select('sm_position', ['RS隊長' => 'RS隊長', '団委員長' => '団委員長'], null, ['class' => 'form-control custom-select']) !!}
</div>
