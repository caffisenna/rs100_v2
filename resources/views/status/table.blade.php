<div class="table-responsive">
    <table class="table" id="status-table">
        <thead>
            <tr>
                <th>状況</th>
                <th>ID</th>
                <th>氏名</th>
                <th>1日目<br>開始</th>
                <th>1日目<br>終了</th>
                <th>2日目<br>開始</th>
                <th>2日目<br>終了</th>
                <th>50km</th>
                <th>100km</th>
                <th>1日目<br>距離</th>
                <th>2日目<br>距離</th>
                <th>総距離</th>
                <th>総時間</th>
                <th>画像</th>
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
                        <td>@auth @if (Auth::user()->is_admin || Auth::user()->name == $user->name){{ $user->name }}@endif
                            @endauth<br>{{ $user->entryform->district }}/{{ $user->entryform->dan_name }}</td>
                        <td class="uk-text-small">{{ @$user->status->day1_start_time }}</td>
                        <td class="uk-text-small">{{ @$user->status->day1_end_time }}</td>
                        <td class="uk-text-small">{{ @$user->status->day2_start_time }}</td>
                        <td class="uk-text-small">{{ @$user->status->day2_end_time }}</td>
                        <td>{{ @$user->status->reach_50km_time }}</td>
                        <td>{{ @$user->status->reach_100km_time }}</td>
                        <td>{{ @$user->status->day1_distance }}</td>
                        <td>{{ @$user->status->day2_distance }}</td>
                        <td>{{ @$user->status->total_distance }}</td>
                        <td>{{ @$user->status->total_time }}</td>
                        <td>{{ @$user->resultupload->count() }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
