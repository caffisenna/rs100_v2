<!-- Create Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_account', 'アカウント作成:') !!}
    {!! Form::select('create_account',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->create_account')) ? $adminConfig->create_account : old('$adminConfig->create_account'),['class'=>'form-control']) !!}
</div>

<!-- Create Application Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_application', '申込書作成:') !!}
    {!! Form::select('create_application',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->create_application')) ? $adminConfig->create_application : old('$adminConfig->create_account'),['class'=>'form-control']) !!}
</div>

<!-- Elearning Field -->
<div class="form-group col-sm-6">
    {!! Form::label('elearning', 'Eラーニング:') !!}
    {!! Form::select('elearning',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->elearning')) ? $adminConfig->elearning : old('$adminConfig->elearning'),['class'=>'form-control']) !!}
</div>

<!-- User Edit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_edit', '申込書修正:') !!}
    {!! Form::select('user_edit',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->user_edit')) ? $adminConfig->user_edit : old('$adminConfig->user_edit'),['class'=>'form-control']) !!}
</div>

<!-- Healthcheck Field -->
<div class="form-group col-sm-6">
    {!! Form::label('healthcheck', '健康調査票:') !!}
    {!! Form::select('healthcheck',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->healthcheck')) ? $adminConfig->healthcheck : old('$adminConfig->user_edit'),['class'=>'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('car_registration', '駐車許可証:') !!}
    {!! Form::select('car_registration',['1'=>'true','0'=>'false'],is_null(old('$adminConfig->car_registration')) ? $adminConfig->car_registration : old('$adminConfig->car_registration'),['class'=>'form-control']) !!}
</div>
