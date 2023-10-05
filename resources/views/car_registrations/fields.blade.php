<!-- Driver Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driver_name', '運転者氏名:') !!}
    {!! Form::text('driver_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Cell Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cell_phone', 'ケータイ:') !!}
    {!! Form::text('cell_phone', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', '地区:') !!}
    {!! Form::text('district', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Dan Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dan_name', '団名:') !!}
    {!! Form::text('dan_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position', '役務:') !!}
    {!! Form::text('position', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Relation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('relation', '参加者との関係:') !!}
    {!! Form::text('relation', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Car Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_number', '車両ナンバー:') !!}
    {!! Form::text('car_number', null, ['class' => 'form-control', 'required']) !!}
</div>

<input type="hidden" name="uuid" value="{{ Str::uuid() }}">
