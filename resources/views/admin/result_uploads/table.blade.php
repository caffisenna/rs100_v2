<div class="table-responsive">
    <table class="table" id="resultUploads-table">
        <thead>
            <tr>
                <th>UserId</th>
                <th>計測日</th>
                <th>距離</th>
                <th>時間</th>
                <th>確認日時</th>
                <th>画像</th>
                <th colspan="3">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultUploads as $resultUpload)
            {{-- {{ dd($resultUploads) }} --}}
                <tr>
                    <td>{{ $resultUpload->id }}{{ $resultUpload->user_name }}{{ $resultUpload->district }}{{ $resultUpload->dan_name }}</td>
                    <td>{{ $resultUpload->date }}</td>
                    <td>{{ $resultUpload->distance }}</td>
                    <td>{{ $resultUpload->time }}</td>
                    <td>{{ $resultUpload->checked_at }}</td>
                    <td><img src="{{ url('/') . '/images/user_uploads/' . $resultUpload->image_path }}" width="250px">
                    </td>
                    <td width="120">
                        {!! Form::open(['route' => ['adminresultUploads.destroy', $resultUpload->id], 'method' => 'delete']) !!}
                        {{-- <a href="{{ route('adminresultUploads.index', [$resultUpload->id]) }}" class="uk-button uk-icon-link" uk-icon="icon:check; ratio:2"></a> --}}
                        <a href="{{ url("/admin/adminresultUploads/?check=$resultUpload->id") }}" class="uk-button uk-icon-link" uk-icon="icon:check; ratio:2"></a>
                        <a href="{{ route('adminresultUploads.edit', [$resultUpload->id]) }}" class='uk-button uk-icon-link' uk-icon="icon:file-edit; ratio:2"></a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger uk-align-center', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
