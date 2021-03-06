<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#entryForms-table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#entryForms-table thead');

        var table = $('#entryForms-table').DataTable({
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
    <table class="uk-table table-striped uk-table-small" id="entryForms-table">
        <thead>
            <tr>
                <th>No</th>
                <th>??????</th>
                <th>??????</th>
                <th>????????????</th>
                <th>?????????</th>
                <th>E??????</th>
                <th>?????????</th>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                {{-- @unless($user->user->is_admin || $user->user->is_staff || $user->user->is_commi) --}}
                @if(isset($user->entryform))
                <tr>
                    <td>{{ @$user->id }}</td>
                    @if (isset($user->entryform->gender))
                        <td><a href="{{ route('adminentries.show', [$user->id]) }}">{{ $user->name }}</a>
                            ({{ @$user->entryform->gender }})<br>{{ @$user->entryform->furigana }}</td>
                    @else
                        <td>{{ $user->name }}<br>(??????????????????)</td>
                    @endif
                    <td>{{ @$user->entryform->district }} {{ @$user->entryform->dan_name }}
                        {{ @$user->entryform->dan_number }}</td>
                    @if (isset($user->entryform->hq_confirmation))
                        <td><span class="uk-text-success">???</span></td>
                    @else
                        <td>?????????</td>
                    @endif
                    @if (isset($user->entryform->sm_confirmation))
                        <td><span class="uk-text-success">???</span></td>
                    @else
                        <td>?????????</td>
                    @endif
                    @if (isset($user->elearning->created_at))
                        <td><span class="uk-text-success">??????</span></td>
                    @else
                        <td>?????????</td>
                    @endif
                    @if (isset($user->planupload['0']))
                        <td><span class="uk-text-success">???</span></td>
                    @else
                        <td>???</td>
                    @endif
                    <td>
                        @if ($user->id){!! Form::open(['route' => ['adminentries.destroy', $user->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                {{-- <a href="{{ route('adminentries.show', [$user->id]) }}" class='btn btn-default btn-xs'> <i class="far fa-eye"></i></a> --}}
                                <a href="{{ route('adminentries.edit', [$user->id]) }}"
                                    class='btn btn-default btn-xs'> <i class="far fa-edit"></i></a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('????????????????????????????')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
                @endif
                {{-- @endunless --}}
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#entryForms-table').DataTable();
    });
</script>
