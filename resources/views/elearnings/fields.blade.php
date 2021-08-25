<!-- Q1 Field -->
<div class="form-group col-sm-12">
    {!! Form::label('q1', 'Q1', ['class' => 'form-check-label']) !!}
    <label class="form-check">
        {!! Form::radio('q1', 'mac', null, ['class' => 'form-check-input']) !!} mac
    </label>

    <label class="form-check">
        {!! Form::radio('q1', 'iPhone', null, ['class' => 'form-check-input']) !!} iPhone
    </label>

    <label class="form-check">
        {!! Form::radio('q1', 'iPad', null, ['class' => 'form-check-input']) !!} iPad
    </label>

</div>

<!-- Q2 Field -->
<div class="form-group col-sm-12">
    {!! Form::label('q2', 'Q2', ['class' => 'form-check-label']) !!}
    <label class="form-check">
        {!! Form::radio('q2', '牛丼', null, ['class' => 'form-check-input']) !!} 牛丼
    </label>

    <label class="form-check">
        {!! Form::radio('q2', 'カレー', null, ['class' => 'form-check-input']) !!} カレー
    </label>

    <label class="form-check">
        {!! Form::radio('q2', '酢豚', null, ['class' => 'form-check-input']) !!} 酢豚
    </label>

</div>
