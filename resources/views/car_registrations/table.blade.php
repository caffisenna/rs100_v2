<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="car_registrations-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>運転者</th>
                    <th>地区</th>
                    <th>団名</th>
                    <th>カーナンバー</th>
                    <th>許可証</th>
                    <th>発行</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carRegistrations as $carRegistration)
                    <tr>
                        <td><a
                                href="{{ route('car_registrations.show', [$carRegistration->id]) }}">{{ $carRegistration->id }}</a>
                        </td>
                        <td>{{ $carRegistration->driver_name }}</td>
                        <td>{{ $carRegistration->district }}</td>
                        <td>{{ $carRegistration->dan_name }}</td>
                        <td>{{ $carRegistration->car_number }}</td>
                        <td><a href="{{ url('/car_registration_pdf?uuid=') }}{{ $carRegistration->uuid }}"><span
                                    uk-icon="file-pdf"></span></a></td>
                        <td>
                            @if (!$carRegistration->published_at)
                                <a href="{{ url('/car_registration_publish?uuid=') }}{{ $carRegistration->uuid }}"
                                    class="uk-button uk-button-primary uk-button-small">発行</a>
                            @else
                                <p class="uk-text-success">済み</p>
                            @endif
                        </td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['car_registrations.destroy', $carRegistration->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('car_registrations.show', [$carRegistration->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <span uk-icon="eye"></span>
                                </a>
                                <a href="{{ route('car_registrations.edit', [$carRegistration->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <span uk-icon="file-edit"></span>
                                </a>
                                {!! Form::button('<span uk-icon="trash"></span>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
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
            @include('adminlte-templates::common.paginate', ['records' => $carRegistrations])
        </div>
    </div>
</div>
