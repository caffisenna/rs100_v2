<div class="table-responsive">
    <table class="table" id="status-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>1日目<br>歩行開始</th>
                <th>1日目<br>歩行終了</th>
                <th>2日目<br>歩行開始</th>
                <th>2日目<br>歩行終了</th>
                <th>50km到達</th>
                <th>100km到達</th>
                <th>1日目<br>歩行距離</th>
                <th>2日目<br>歩行距離</th>
                <th>総歩行距離</th>
                <th>総歩行時間</th>
                <th>画像UP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ $status->user_id }}<br>@auth @if(Auth::user()->is_admin || Auth::user()->name == $status->name){{ $status->name }}@endif @endauth<br>{{ $status->dan }}</td>
                    <td>{{ $status->day1_start_time }}</td>
                    <td>{{ $status->day1_end_time }}</td>
                    <td>{{ $status->day2_start_time }}</td>
                    <td>{{ $status->day2_end_time }}</td>
                    <td>{{ $status->reach_50km_time }}</td>
                    <td>{{ $status->reach_100km_time }}</td>
                    <td>{{ $status->day1_distance }}</td>
                    <td>{{ $status->day2_distance }}</td>
                    <td>{{ $status->distance_total }}</td>
                    <td>{{ $status->hms }}</td>
                    <td>{{ $status->up }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
