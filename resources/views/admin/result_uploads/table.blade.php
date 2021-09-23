<div class="table-responsive">
    <table class="table" id="resultUploads-table">
        <thead>
            <tr>
                <th>参加者</th>
                <th>scan data</th>
                <th>画像</th>
                <th>確認日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultUploads as $resultUpload)
            {{-- {{ dd($resultUploads) }} --}}
                <tr>
                    <td>画像ID: {{ $resultUpload->id }}<br>
                        参加者ID:{{ $resultUpload->user_id }}<br>
                        <a href="{{ route('adminentries.show', [$resultUpload->user_id]) }}">{{ $resultUpload->user_name }}</a><br>
                        {{ $resultUpload->district }}地区{{ $resultUpload->dan_name }}団</td>
                    <td>{{ $resultUpload->distance }}km<br>{{ $resultUpload->time }}</td>
                    <td><img src="{{ url('/') . '/images/user_uploads/' . $resultUpload->image_path }}" width="200px">
                    <td>{{ $resultUpload->checked_at }}</td>
                    </td>
                    <td width="120">
                        {!! Form::open(['route' => ['adminresultUploads.destroy', $resultUpload->id], 'method' => 'delete']) !!}
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
