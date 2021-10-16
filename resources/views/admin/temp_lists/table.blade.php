<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<div class="table-responsive">
    <table class="table" id="result_lists-table">
        <thead>
            <tr>
                <th>名前</th>
                <th>所属</th>
                <th>1日目開始前</th>
                <th>1日目終了後</th>
                <th>2日目開始前</th>
                <th>2日目終了後</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><a href="{{ route('adminentries.show', [$user->id]) }}">{{ $user->user->name }}</a></td>
                    <td>{{ $user->district }} {{ $user->dan_name }}</td>
                    <td>@if ($user->temps->temp_day1_before == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day1_before }}</span>@else{{ $user->temps->temp_day1_before }}@endif</td>
                    <td>@if ($user->temps->temp_day1_before == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day1_before }}</span>@else{{ $user->temps->temp_day1_before }}@endif</td>
                    <td>@if ($user->temps->temp_day2_before == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day2_before }}</span>@else{{ $user->temps->temp_day2_before }}@endif</td>
                    <td>@if ($user->temps->temp_day2_after == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day2_after }}</span>@else{{ $user->temps->temp_day2_after }}@endif</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#resultLists-table').DataTable();
    });
</script>
