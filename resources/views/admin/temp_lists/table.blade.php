<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#temps-table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#temps-table thead');

        var table = $('#temps-table').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function() {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('keyup change', function(e) {
                                e.stopPropagation();

                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr =
                                '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value +
                                            ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();

                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });
</script>
<div class="table-responsive">
    <table class="uk-table table-condensed uk-table-small" id="temps-table">
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
                    <td><a href="{{ route('adminentries.show', [$user->id]) }}">{{ $user->name }}</a></td>
                    <td>{{ @$user->entryform->district }} {{ @$user->entryform->dan_name }}</td>
                    <td>@if(isset($user->temps->temp_day1_before))@if ($user->temps->temp_day1_before == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day1_before }}</span>@else{{ $user->temps->temp_day1_before }}@endif @endif<br>
                        {{ @$user->status->day1_start_time }}</td>
                    <td>@if(isset($user->temps->temp_day1_after))@if ($user->temps->temp_day1_after == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day1_after }}</span>@else{{ $user->temps->temp_day1_after }}@endif @endif<br>
                        {{ @$user->status->day1_end_time }}</td>
                    <td>@if(isset($user->temps->temp_day2_before))@if ($user->temps->temp_day2_before == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day2_before }}</span>@else{{ $user->temps->temp_day2_before }}@endif @endif<br>
                        {{ @$user->status->day2_start_time }}</td>
                    <td>@if(isset($user->temps->temp_day2_after))@if ($user->temps->temp_day2_after == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day2_after }}</span>@else{{ $user->temps->temp_day2_after }}@endif @endif<br>
                        {{ @$user->status->day2_end_time }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#temps-table').DataTable();
    });
</script>
