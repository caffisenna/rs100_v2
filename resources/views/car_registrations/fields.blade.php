<!-- Driver Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driver_name', '運転者氏名:') !!}
    {!! Form::text('driver_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Cell Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cell_phone', '携帯電話番号:') !!}
    {!! Form::text('cell_phone', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:許可証をお送りします') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', '地区:東京連盟以外の方は「他県連」を選択してください') !!}
    {!! Form::select(
        'district',
        [
            '' => '',
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
            '北多摩' => '北多摩',
            '他県連' => '他県連',
        ],
        null,
        ['class' => 'form-control custom-select'],
    ) !!}
</div>

<!-- Dan Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dan_name', '団名:') !!}
    {!! Form::text('dan_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position', '役務:指導者で役務のある方は入力してください') !!}
    {!! Form::text('position', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Relation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('relation', '参加者との関係:') !!}
    {!! Form::select(
        'relation',
        [
            '' => '',
            '隊・団指導者' => '隊・団指導者',
            '保護者' => '保護者',
            'その他支援者' => 'その他支援者',
        ],
        null,
        ['class' => 'form-control custom-select'],
    ) !!}
</div>

<!-- Car Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_number', '車両ナンバー:') !!}
    {!! Form::text('car_number', null, ['class' => 'form-control', 'required']) !!}
</div>

<input type="hidden" name="uuid" value="{{ Str::uuid() }}">
