<div class="table-responsive">
    <table class="table" id="resultUploads-table">
        <thead>
            <tr>
                <th>画像</th>
                <th>情報</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultUploads as $resultUpload)
                <tr>
                    <td><a href="{{ url('/') . '/images/user_uploads/' . $resultUpload->image_path }}"><img
                                src="{{ url('/') . '/images/user_uploads/' . $resultUpload->image_path }}"
                                width="250px" uk-img></a>
                    </td>
                    <td>
                        <ul class="uk-list">
                            <li>{{ $resultUpload->day }}日目の記録</li>
                            <li>距離: {{ $resultUpload->distance }}<span class="uk-text-small">km</span></li>
                            <li>時間: {{ $resultUpload->time }}</li>
                            <li>アップ日時:{{ $resultUpload->created_at }}</li>
                            <li>チェック日時:<span class="uk-text-success">{{ $resultUpload->checked_at }}</span></li>
                        </ul>
                        @if(empty($resultUpload->checked_at))
                        {!! Form::open(['route' => ['resultUploads.destroy', $resultUpload->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
