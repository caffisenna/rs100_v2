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
    <table class="uk-table table-condensed uk-table-striped" id="temps-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>所属</th>
                <th>参加形態</th>
                <th>歩行開始</th>
                <th>前検温</th>
                <th>歩行終了</th>
                <th>後検温</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if (isset($user->entryform->district))
                    <tr>
                        <td class="uk-text-small">{{ @$user->id }}</td>
                        <td class="uk-text-small"><a
                                href="{{ route('adminentries.show', [$user->id]) }}">{{ $user->name }}</a>@if (isset($user->status->whole_retire))<span class="uk-text-danger">[リ]</span>@endif
                        </td>
                        <td class="uk-text-small">{{ @$user->entryform->district }} {{ @$user->entryform->dan_name }}</td>
                        @if (app('request')->input('q') == 'day1')
                            <td class="uk-text-small">
                                @switch(@$user->entryform->how_to_join)
                                    @case(1)
                                        両日参加(両日とも10:00までにスタート)
                                    @break
                                    @case(2)
                                        両日参加(初日10:00までにスタートかつ 2日目10:00以降スタート)
                                    @break
                                    @case(3)
                                        両日参加(初日10:00以降スタート かつ 2日目10:00までにスタート)
                                    @break
                                    @case(4)
                                        両日参加(両日とも10:00以降にスタート)
                                    @break
                                    @case(5)
                                        1日目だけ参加(10:00までにスタート)
                                    @break
                                    @case(6)
                                        1日目だけ遅参(10:00以降にスタート)
                                    @break
                                    @case(7)
                                        2日目だけ参加(10:00までにスタート)
                                    @break
                                    @case(8)
                                        2日目だけ遅参(10:00以降にスタート)
                                    @break
                                @endswitch
                            </td>
                            <td class="uk-text-small">{{ @$user->status->day1_start_time }}</td>
                            <td class="uk-text-small">@if (isset($user->temps->temp_day1_before))@if ($user->temps->temp_day1_before == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day1_before }}</span>@else{{ $user->temps->temp_day1_before }}@endif @endif</td>
                            <td class="uk-text-small">{{ @$user->status->day1_end_time }}</td>
                            <td class="uk-text-small">@if (isset($user->temps->temp_day1_after))@if ($user->temps->temp_day1_after == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day1_after }}</span>@else{{ $user->temps->temp_day1_after }}@endif @endif</td>
                        @else
                            <td class="uk-text-small">{{ @$user->status->day2_start_time }}</td>
                            <td class="uk-text-small">@if (isset($user->temps->temp_day2_before))@if ($user->temps->temp_day2_before == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day2_before }}</span>@else{{ $user->temps->temp_day2_before }}@endif @endif</td>
                            <td class="uk-text-small">{{ @$user->status->day2_end_time }}</td>
                            <td class="uk-text-small">@if (isset($user->temps->temp_day2_after))@if ($user->temps->temp_day2_after == '37.5度以上')<span class="uk-text-danger">{{ $user->temps->temp_day2_after }}</span>@else{{ $user->temps->temp_day2_after }}@endif @endif</td>
                        @endif
                    </tr>
                @endif

            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#temps-table').DataTable();
    });
</script>
