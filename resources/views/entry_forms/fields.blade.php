<!-- Furigana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('furigana', 'Furigana:') !!}
    {!! Form::text('furigana', null, ['class' => 'form-control']) !!}
</div>

<!-- Bs Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bs_id', 'Bs Id:') !!}
    {!! Form::text('bs_id', null, ['class' => 'form-control']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', 'District:') !!}
    {!! Form::select('district', ['渋谷' => '渋谷', '目黒' => '目黒'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Dan Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dan_name', 'Dan Name:') !!}
    {!! Form::text('dan_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Dan Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dan_number', 'Dan Number:') !!}
    {!! Form::text('dan_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Birth Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_day', 'Birth Day:') !!}
    {!! Form::text('birth_day', null, ['class' => 'form-control', 'id' => 'birth_day']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#birth_day').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ['男' => '男', '女' => '女'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Zip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zip', 'Zip:') !!}
    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Cellphone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cellphone', 'Cellphone:') !!}
    {!! Form::text('cellphone', null, ['class' => 'form-control']) !!}
</div>

<!-- 50Km Exp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exp_50km_exp', 'exp_50Km:') !!}
    {!! Form::select('exp_50km', ['あり' => 'あり', 'なし' => 'なし'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Parent Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_name', 'Parent Name:') !!}
    {!! Form::text('parent_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Name Furigana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_name_furigana', 'Parent Name Furigana:') !!}
    {!! Form::text('parent_name_furigana', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Relation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_relation', 'Parent Relation:') !!}
    {!! Form::text('parent_relation', null, ['class' => 'form-control']) !!}
</div>

<!-- Emer Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emer_phone', 'Emer Phone:') !!}
    {!! Form::text('emer_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Sm Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sm_name', 'Sm Name:') !!}
    {!! Form::text('sm_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Sm Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sm_position', 'Sm Position:') !!}
    {!! Form::select('sm_position', ['RS隊長' => 'RS隊長', '団委員長' => '団委員長'], null, ['class' => 'form-control custom-select']) !!}
</div>
