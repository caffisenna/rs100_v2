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
                            <li>距離: {{ $resultUpload->distance }}<span class="uk-text-small">km</span></li>
                            <li>時間: {{ $resultUpload->time }}</li>
                            <li>{{ $resultUpload->created_at }}</li>
                        </ul>
                        {!! Form::open(['route' => ['resultUploads.destroy', $resultUpload->id], 'method' => 'delete']) !!}
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
