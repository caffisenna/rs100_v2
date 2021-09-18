<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $resultUpload->user_id }}</p>
</div>

<!-- Time Field -->
<div class="col-sm-12">
    {!! Form::label('time', 'Time:') !!}
    <p>{{ $resultUpload->time }}</p>
</div>

<!-- Distance Field -->
<div class="col-sm-12">
    {!! Form::label('distance', 'Distance:') !!}
    <p>{{ $resultUpload->distance }}</p>
</div>

<!-- Image Path Field -->
<div class="col-sm-12">
    {!! Form::label('image_path', 'Image Path:') !!}
    <p>{{ $resultUpload->image_path }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $resultUpload->image }}</p>
</div>

