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
                        @if (isset($user->status->whole_retire))
                            <td class="uk-text-danger">リタイア</td>
                        @elseif (isset($user->status->day1_end_time) && isset($user->status->day2_end_time))
                            <td class="uk-text-warning">歩行終了</td>
                        @elseif (empty($user->status->day1_start_time) && empty($user->status->day1_end_time) && empty($user->status->day2_start_time) && empty($user->status->day2_end_time))
                            <td class="uk-text-primary">開始前</td>
                        @elseif (isset($user->status->day2_start_time) && empty($user->status->day2_end_time))
                            <td class="uk-text-success">day2歩行中</td>
                        @elseif (isset($user->status->day1_end_time) && empty($user->status->day2_start_time))
                            <td class="uk-text-warning">day1終了</td>
                        @elseif (isset($user->status->day1_start_time) || empty($user->status->day1_end_time))
                            <td class="uk-text-success">歩行中</td>
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
