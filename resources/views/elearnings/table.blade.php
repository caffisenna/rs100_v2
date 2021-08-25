<div class="table-responsive">
    <table class="table" id="elearnings-table">
        <thead>
            <tr>
                <th>Q1</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        {{-- @foreach($elearnings as $elearning) --}}
            <tr>
                <td>{{ $elearning->q1 }}</td>
                <td width="120">
                    @if($elearning->id)
                    {!! Form::open(['route' => ['elearnings.destroy', $elearning->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('elearnings.show', [$elearning->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('elearnings.edit', [$elearning->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        {{-- @endforeach --}}
        </tbody>
    </table>
</div>
