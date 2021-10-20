<div class="table-responsive">
    <table class="table" id="reach50100s-table">
        <thead>
            <tr>
                <th>User Id</th>
                <th>50km</th>
                <th>100km</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reach50100s as $reach50100)
                <tr>
                    <td>{{ $reach50100->user_id }}</td>
                    <td>{{ $reach50100->reach50 }}</td>
                    <td>{{ $reach50100->reach100 }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['reach50100.destroy', $reach50100->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('reach50100.edit', [$reach50100->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
