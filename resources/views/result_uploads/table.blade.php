<div class="table-responsive">
    <table class="table" id="resultUploads-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>計測日</th>
                <th>距離</th>
                <th>時間</th>
                <th>ファイル名</th>
                <th>画像</th>
                <th colspan="3">Act</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultUploads as $resultUpload)
                <tr>
                    <td>{{ $resultUpload->user_id }}</td>
                    <td>{{ $resultUpload->date -> format('m/d') }}</td>
                    <td>{{ $resultUpload->distance }}</td>
                    <td>{{ $resultUpload->time }}</td>
                    <td>{{ $resultUpload->image_path }}</td>
                    <td><img src="{{ url('/') . '/images/user_uploads/' . $resultUpload->image_path }}" width="250px"></td>
                    <td width="120">
                        {!! Form::open(['route' => ['resultUploads.destroy', $resultUpload->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('resultUploads.show', [$resultUpload->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('resultUploads.edit', [$resultUpload->id]) }}"
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
