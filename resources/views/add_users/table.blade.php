<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="add-users-table">
            <thead>
                <tr>
                    <th>氏名</th>
                    <th>Email</th>
                    <th>役務</th>
                    <th>地区</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $users)
                    @unless ($users->email == 'caffi.senna@gmail.com')
                        <tr>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->role }}</td>
                            <td>{{ $users->district }}</td>
                            <td style="width: 120px">
                                {!! Form::open(['route' => ['add_users.destroy', $users->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('add_users.show', [$users->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('add_users.edit', [$users->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "return confirm('Are you sure?')",
                                    ]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endunless
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            {{-- @include('adminlte-templates::common.paginate', ['records' => $users]) --}}
        </div>
    </div>
</div>
