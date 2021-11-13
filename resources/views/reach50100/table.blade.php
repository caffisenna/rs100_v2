<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#reach50100-table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#reach50100-table thead');

        var table = $('#reach50100-table').DataTable({
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
    <table class="table table-condensed table-striped" id="reach50100-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>氏名</th>
                <th>性別</th>
                <th>所属</th>
                <th>Day1距離</th>
                <th>Day2距離</th>
                <th>50km</th>
                <th>100km</th>
                <th>総歩行距離</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            {{-- @if(isset($user->status->reach_50km_time) || isset($user->status->reach_100km_time)) --}}
            @if(isset($user->status->total_distance))
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->entryform->gender }}</td>
                    <td>{{ $user->entryform->district }}/{{ $user->entryform->dan_name }}</td>
                    <td>{{ $user->status->day1_distance }}</td>
                    <td>{{ $user->status->day2_distance }}</td>
                    <td>{{ $user->status->reach_50km_time }}</td>
                    <td>{{ $user->status->reach_100km_time }}</td>
                    <td>{{ $user->status->total_distance }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#reach50100-table').DataTable();
    });
</script>
