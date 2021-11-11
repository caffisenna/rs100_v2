<div class="table-responsive">
    <table class="uk-table uk-table-small uk-table-striped" id="status-table">
        <thead>
            <tr>
                <th>状況</th>
                <th>ID</th>
                <th>所属</th>
                <th>総距離</th>
                <th>総時間</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if (isset($user->entryform->district))

                    <tr>
                        @if (empty($user->status->whole_retire))
                            <td class="uk-text-success">歩行中</td>
                        @else
                            <td class="uk-text-danger">リタイア</td>
                        @endif
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->entryform->district }}/{{ $user->entryform->dan_name }}</td>
                        <td>{{ @$user->status->total_distance }}</td>
                        <td>{{ @$user->status->total_time }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
