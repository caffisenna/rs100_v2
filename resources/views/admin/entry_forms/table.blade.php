<div class="table-responsive">
    <table class="table" id="entryForms-table">
        <thead>
            <tr>
                <th>名前</th>
                <th>所属</th>
                <th>性別</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entryForms as $entryForm)
                <tr>
                    <td><a
                            href="mailto:{{ $entryForm->user->email }}">{{ $entryForm->user->name }}</a><br>{{ $entryForm->furigana }}
                    </td>
                    <td>{{ $entryForm->district }}地区 {{ $entryForm->dan_name }} {{ $entryForm->dan_number }}</td>
                    <td>{{ $entryForm->gender }}</td>
                    <td width="120">
                        @if ($entryForm->id)
                            {!! Form::open(['route' => ['entries.destroy', $entryForm->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('entries.show', [$entryForm->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('entries.edit', [$entryForm->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
