@if (Auth()->user()->is_admin && Auth()->user()->is_commi && Auth()->user()->is_staff)
    <!-- file Path Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('file_path', 'file Path:') !!}
        {!! Form::text('file_path', null, ['class' => 'form-control']) !!}
    </div>
@endunless

<!-- file Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', '計画ファイル:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input']) !!}
            {!! Form::label('file', '計画ファイルを選択', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
    @error('file')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="clearfix"></div>
<!-- User Id Field -->
<div class="form-group col-sm-6">
    {{-- {!! Form::label('user_id', 'User Id:') !!} --}}
    {!! Form::hidden('user_id', Auth()->user()->id, ['class' => 'form-control']) !!}
</div>
