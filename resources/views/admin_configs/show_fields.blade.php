<!-- Create Account Field -->
<div class="col-sm-12">
    {!! Form::label('create_account', 'Create Account:') !!}
    <p>{{ $adminConfig->create_account }}</p>
</div>

<!-- Create Application Field -->
<div class="col-sm-12">
    {!! Form::label('create_application', 'Create Application:') !!}
    <p>{{ $adminConfig->create_application }}</p>
</div>

<!-- Elearning Field -->
<div class="col-sm-12">
    {!! Form::label('elearning', 'Elearning:') !!}
    <p>{{ $adminConfig->elearning }}</p>
</div>

<!-- Healthcheck Field -->
<div class="col-sm-12">
    {!! Form::label('healthcheck', 'Healthcheck:') !!}
    <p>{{ $adminConfig->healthcheck }}</p>
</div>

<!-- User Edit Field -->
<div class="col-sm-12">
    {!! Form::label('user_edit', 'User Edit:') !!}
    <p>{{ $adminConfig->user_edit }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $adminConfig->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $adminConfig->updated_at }}</p>
</div>

