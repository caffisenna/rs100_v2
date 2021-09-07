@if(Auth()->user()->is_admin && Auth()->user()->is_commi && Auth()->user()->is_staff)
<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::text('time', null, ['class' => 'form-control']) !!}
</div>

<!-- Distance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('distance', 'Distance:') !!}
    {!! Form::text('distance', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_path', 'Image Path:') !!}
    {!! Form::text('image_path', null, ['class' => 'form-control']) !!}
</div>
@endunless

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', '画像ファイル:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', '画像ファイルを選択', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- User Id Field -->
<div class="form-group col-sm-6">
    {{-- {!! Form::label('user_id', 'User Id:') !!} --}}
    {!! Form::hidden('user_id', Auth()->user()->id, ['class' => 'form-control']) !!}
</div>
