<!-- User Id Field -->
{!! Form::hidden('user_id', auth()->id(), ['class' => 'form-control']) !!}

<!-- Day Field -->
<div class="form-group col-sm-12">
    {!! Form::label('day', 'X日目:') !!}
    {!! Form::select('day', ['' => '', '1' => '第1日目', '2' => '第2日目'], null, ['class' => 'form-control custom-select']) !!}
    @error('day')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Distance Field -->
<div class="form-group col-sm-12">
    <h3>距離の入力方法</h3>
    <ul class="uk-text-warning">
        <li>34.8km : 34.8 と入力</li>
        <li>12km : 12 と入力</li>
    </ul>
    {!! Form::label('distance', '距離:') !!}
    {!! Form::text('distance', null, ['class' => 'form-control']) !!}
    @error('distance')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Time Field -->
<div class="form-group col-sm-12">
    {!! Form::label('time', '時間:') !!}
    <h3>時間の入力方法</h3>
    <ul class="uk-text-warning">
        <li>10時間42分の場合 : 10:42 と入力</li>
        <li>0時間59分の場合 : 0:59 と入力</li>
    </ul>
    {!! Form::text('time', null, ['class' => 'form-control']) !!}
    @error('time')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>
