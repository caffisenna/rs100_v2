<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="car_registrations-table">
            <thead>
            <tr>
                <th>運転者</th>
                <th>ケータイ</th>
                <th>Email</th>
                <th>地区</th>
                <th>団名</th>
                <th>役務</th>
                <th>参加者との関係</th>
                <th>カーナンバー</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carRegistrations as $carRegistration)
                <tr>
                    <td>{{ $carRegistration->driver_name }}</td>
                    <td>{{ $carRegistration->cell_phone }}</td>
                    <td>{{ $carRegistration->email }}</td>
                    <td>{{ $carRegistration->district }}</td>
                    <td>{{ $carRegistration->dan_name }}</td>
                    <td>{{ $carRegistration->position }}</td>
                    <td>{{ $carRegistration->relation }}</td>
                    <td>{{ $carRegistration->car_number }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['car_registrations.destroy', $carRegistration->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('car_registrations.show', [$carRegistration->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('car_registrations.edit', [$carRegistration->id]) }}"
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

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $carRegistrations])
        </div>
    </div>
</div>
