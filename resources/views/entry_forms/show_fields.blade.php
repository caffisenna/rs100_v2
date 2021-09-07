<!-- Furigana Field -->
<div class="col-sm-12">
    {!! Form::label('furigana', '氏名:') !!}
    <p>{{ $entryForm->user->name }}({{ $entryForm->furigana }})</p>
</div>

<!-- Bs Id Field -->
<div class="col-sm-12">
    {!! Form::label('bs_id', '登録番号:') !!}
    <p>{{ $entryForm->bs_id }}</p>
</div>

<!-- District Field -->
<div class="col-sm-12">
    {!! Form::label('district', '所属:') !!}
    <p>{{ $entryForm->district }}地区 {{ $entryForm->dan_name }}団</p>
</div>

<!-- Birth Day Field -->
<div class="col-sm-12">
    {!! Form::label('birth_day', '生年月日:') !!}
    <p>{{ $entryForm->birth_day->format('Y-m-d') }}</p>
</div>

<!-- Gender Field -->
<div class="col-sm-12">
    {!! Form::label('gender', '性別:') !!}
    <p>{{ $entryForm->gender }}</p>
</div>

<!-- Zip Field -->
<div class="col-sm-12">
    {!! Form::label('zip', '郵便番号:') !!}
    <p>{{ $entryForm->zip }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', '住所:') !!}
    <p>{{ $entryForm->address }}</p>
</div>

<!-- Telephone Field -->
<div class="col-sm-12">
    {!! Form::label('telephone', '電話番号:') !!}
    <p>{{ $entryForm->telephone }}</p>
</div>

<!-- Cellphone Field -->
<div class="col-sm-12">
    {!! Form::label('cellphone', 'ケータイ:') !!}
    <p>{{ $entryForm->cellphone }}</p>
</div>

<!-- 50Km Exp Field -->
<div class="col-sm-12">
    {!! Form::label('exp_50km', '50kmハイク経験:') !!}
    <p>{{ $entryForm->exp_50km }}</p>
</div>

<!-- Parent Name Field -->
<div class="col-sm-12">
    {!! Form::label('parent_name', '保護者氏名:') !!}
    <p>{{ $entryForm->parent_name }}</p>
</div>

<!-- Parent Name Furigana Field -->
<div class="col-sm-12">
    {!! Form::label('parent_name_furigana', '保護者ふりがな:') !!}
    <p>{{ $entryForm->parent_name_furigana }}</p>
</div>

<!-- Parent Relation Field -->
<div class="col-sm-12">
    {!! Form::label('parent_relation', '保護者続柄:') !!}
    <p>{{ $entryForm->parent_relation }}</p>
</div>

<!-- Emer Phone Field -->
<div class="col-sm-12">
    {!! Form::label('emer_phone', '緊急連絡先:') !!}
    <p>{{ $entryForm->emer_phone }}</p>
</div>

<!-- Sm Name Field -->
<div class="col-sm-12">
    {!! Form::label('sm_name', '隊長氏名:') !!}
    <p>{{ $entryForm->sm_name }}</p>
</div>

<!-- Sm Position Field -->
<div class="col-sm-12">
    {!! Form::label('sm_position', '役務:') !!}
    <p>{{ $entryForm->sm_position }}</p>
</div>

