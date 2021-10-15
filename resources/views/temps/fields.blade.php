<!-- User Id Field -->
{!! Form::hidden('user_id', auth()->id(), ['class' => 'form-control']) !!}

<div class="form-group col-sm-6">
    {!! Form::label('temp_day1_before', '11/13(土)開始前の体温:') !!}
    {!! Form::select('temp_day1_before', ['' => '', ''=>'','37.5度以下' => '37.5度以下', '37.5度以上' => '37.5度以上'], null, ['class' => 'form-control custom-select']) !!}
    @error('temp_day1_before')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6">
    {!! Form::label('temp_day1_after', '11/13(土)終了後の体温:') !!}
    {!! Form::select('temp_day1_after', ['' => '', ''=>'','37.5度以下' => '37.5度以下', '37.5度以上' => '37.5度以上'], null, ['class' => 'form-control custom-select']) !!}
    @error('temp_day2_after')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6">
{!! Form::label('temp_day2_before', '11/14(日)開始前の体温:') !!}
    {!! Form::select('temp_day2_before', ['' => '', ''=>'','37.5度以下' => '37.5度以下', '37.5度以上' => '37.5度以上'], null, ['class' => 'form-control custom-select']) !!}
    @error('temp_day2_before')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6">
{!! Form::label('temp_day2_after', '11/14(日)終了後の体温:') !!}
    {!! Form::select('temp_day2_after', ['' => '', ''=>'','37.5度以下' => '37.5度以下', '37.5度以上' => '37.5度以上'], null, ['class' => 'form-control custom-select']) !!}
    @error('temp_day2_after')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>
