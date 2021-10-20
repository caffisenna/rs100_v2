<div class="table-responsive">
    <table class="table" id="resultInputs-table">
        <thead>
            <tr>
                <th>日目</th>
                <th>距離</th>
                <th>時間</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultInputs as $resultInputs)
                <tr>
                    <td>{{ $resultInputs->day }}</td>
                    <td>{{ $resultInputs->distance }}</td>
                    <td>{{ $resultInputs->time }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['resultInputs.destroy', $resultInputs->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('resultInputs.edit', [$resultInputs->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
