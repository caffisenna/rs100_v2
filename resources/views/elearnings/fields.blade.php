<!-- Q1 Field -->
<div class="form-group col-sm-12 @if($errors->has('q1')) has-error @endif">
    {!! Form::label('q1', 'Q1 好きなデバイスは?', ['class' => 'form-check-label']) !!}
    <label class="form-check">
        {!! Form::radio('q1', '1', null, ['class' => 'form-check-input']) !!} mac
    </label>

    <label class="form-check">
        {!! Form::radio('q1', '2', null, ['class' => 'form-check-input']) !!} iPhone
    </label>

    <label class="form-check">
        {!! Form::radio('q1', '3', null, ['class' => 'form-check-input']) !!} iPad
    </label>

</div>

<!-- Q2 Field -->
<div class="form-group col-sm-12">
    {!! Form::label('q2', 'Q2 好きな食べ物は?', ['class' => 'form-check-label']) !!}
    <label class="form-check">
        {!! Form::radio('q2', '1', null, ['class' => 'form-check-input']) !!} 牛丼
    </label>

    <label class="form-check">
        {!! Form::radio('q2', '2', null, ['class' => 'form-check-input']) !!} カレー
    </label>

    <label class="form-check">
        {!! Form::radio('q2', '3', null, ['class' => 'form-check-input']) !!} 酢豚
    </label>

</div>
