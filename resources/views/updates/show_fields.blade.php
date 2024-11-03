<!-- Body Field -->
<div class="col-sm-12">
    {!! Form::label('body', '記事:') !!}
    <p>{{ $update->body }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $update->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $update->updated_at }}</p>
</div>
