<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Reach50 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reach50', '50km到達時刻:') !!}
    {!! Form::text('reach50', null, ['class' => 'form-control']) !!}
</div>

<!-- Reach100 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reach100', '100km到達時刻:') !!}
    {!! Form::text('reach100', null, ['class' => 'form-control']) !!}
</div>
