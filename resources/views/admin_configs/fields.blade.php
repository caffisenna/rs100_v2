<!-- Create Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_account', 'Create Account:') !!}
    {!! Form::select('create_account',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->create_account')) ? $adminConfig->create_account : old('$adminConfig->create_account'),['class'=>'form-control']) !!}
</div>

<!-- Create Application Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_application', '申込書作成:') !!}
    {!! Form::select('create_application',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->create_application')) ? $adminConfig->create_application : old('$adminConfig->create_account'),['class'=>'form-control']) !!}
</div>

<!-- Elearning Field -->
<div class="form-group col-sm-6">
    {!! Form::label('elearning', 'Elearning:') !!}
    {!! Form::select('elearning',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->elearning')) ? $adminConfig->elearning : old('$adminConfig->elearning'),['class'=>'form-control']) !!}
</div>

<!-- Healthcheck Field -->
<div class="form-group col-sm-6">
    {!! Form::label('healthcheck', 'Healthcheck:') !!}
    {!! Form::select('healthcheck',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->healthcheck')) ? $adminConfig->healthcheck : old('$adminConfig->healthcheck'),['class'=>'form-control']) !!}
</div>

<!-- User Edit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_edit', 'User Edit:') !!}
    {!! Form::select('user_edit',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->user_edit')) ? $adminConfig->user_edit : old('$adminConfig->user_edit'),['class'=>'form-control']) !!}
</div>

<!-- User Upload Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_upload', '計画書 Upload:') !!}
    {!! Form::select('user_upload',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->user_upload')) ? $adminConfig->user_upload : old('$adminConfig->user_upload'),['class'=>'form-control']) !!}
</div>

<!-- status day1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_day1', 'Status Day1:') !!}
    {!! Form::select('status_day1',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->status_day1')) ? $adminConfig->status_day1 : old('$adminConfig->status_day1'),['class'=>'form-control']) !!}
</div>
<!-- status day2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_day2', 'Status Day2:') !!}
    {!! Form::select('status_day2',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->status_day2')) ? $adminConfig->status_day2 : old('$adminConfig->status_day2'),['class'=>'form-control']) !!}
</div>
