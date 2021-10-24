<div class="table-responsive">
    <table class="table" id="planUploads-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>氏名</th>
                <th>ファイル名</th>
                <th>uploaded</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->planupload as $value)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}<br>{{ $user->entryform->district }} {{ $user->entryform->dan_name }}
                        </td>
                        <td><a href="{{ url('/') }}/plans/{{ $value->file_path }}">{{ $value->file_path }}</a>
                        </td>
                        <td>{{ $value->created_at }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
