<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#list thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#list thead');

        var table = $('#list').DataTable({
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
    <table class="table" id="list">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>所属</th>
                <th>スクショ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if (isset($user->entryform->district))
            <tr>

                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}@if(isset($user->status->whole_retire))<span class="uk-text-danger">[リ]</span>@endif</td>
                        <td>{{ $user->entryform->district }}/{{ $user->entryform->dan_name }}</td>
                        <td>
                            <div uk-lightbox>
                            @foreach ($user->resultupload as $val)
                                <a href="{{ url("/images/user_uploads/$val->image_path") }}">{{ $val->image_path }}</a>
                                @if (isset($val->checked_at)) <span class="uk-text-success uk-text-large">☑️</span> @endif
                                <br>
                            @endforeach
                        </div>
                        </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#list').DataTable();
    });
</script>
