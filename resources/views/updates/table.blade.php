<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="updates-table">
            <thead>
                <tr>
                    <th>記事</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($updates as $update)
                    <tr>
                        <td>{{ $update->body }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['updates.destroy', $update->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('updates.show', [$update->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('updates.edit', [$update->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('本当に削除しますか?')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $updates])
        </div>
    </div>
</div>
