<div class="table-responsive">
    <table class="table" id="planUploads-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ファイル名</th>
                <th>uploaded</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planUploads as $planUpload)
                <tr>
                    <td>{{ $planUpload->user_id }}</td>
                    <td><a href="{{ url('/') }}/plans/{{ $planUpload->file_path }}">{{ $planUpload->file_path }}</a></td>
                    <td>{{ $planUpload->created_at }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['planUploads.destroy', $planUpload->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
