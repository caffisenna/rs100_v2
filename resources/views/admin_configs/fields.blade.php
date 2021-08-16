<!-- Create Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_account', 'Create Account:') !!}
    {!! Form::select('create_account',['true'=>'true','false'=>'false'],is_null(old('$adminConfig->create_account')) ? $adminConfig->create_account : old('$adminConfig->create_account'),['class'=>'form-control']) !!}
</div>

<!-- Create Application Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_application', 'Create Application:') !!}
    {!! Form::select('create_application',['true'=>'true','false'=>'false'],is_null(old('$adminConfig->create_application')) ? $adminConfig->create_application : old('$adminConfig->create_account'),['class'=>'form-control']) !!}
</div>

<!-- Elearning Field -->
<div class="form-group col-sm-6">
    {!! Form::label('elearning', 'Elearning:') !!}
    {!! Form::select('elearning',['true'=>'true','false'=>'false'],is_null(old('$adminConfig->elearning')) ? $adminConfig->elearning : old('$adminConfig->elearning'),['class'=>'form-control']) !!}
</div>

<!-- Healthcheck Field -->
<div class="form-group col-sm-6">
    {!! Form::label('healthcheck', 'Healthcheck:') !!}
    {!! Form::select('healthcheck',['true'=>'true','false'=>'false'],is_null(old('$adminConfig->healthcheck')) ? $adminConfig->healthcheck : old('$adminConfig->healthcheck'),['class'=>'form-control']) !!}
</div>

<!-- User Edit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_edit', 'User Edit:') !!}
    {!! Form::select('user_edit',['true'=>'true','false'=>'false'],is_null(old('$adminConfig->user_edit')) ? $adminConfig->user_edit : old('$adminConfig->user_edit'),['class'=>'form-control']) !!}
</div>
