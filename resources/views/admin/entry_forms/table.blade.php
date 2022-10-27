<link rel="stylesheet" type="text/css" href="{{ url('/datatables/jquery.dataTables.css') }}">
<script src="{{ url('/datatables/dataTables.fixedHeader.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ url('/datatables/jquery.dataTables.js') }}"></script>
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
                        $(cell).html('<input type="text" placeholder="' + title +
                                            '" style="width:60px" />');

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
                <th>名前</th>
                <th>県連</th>
                <th>所属</th>
                <th>団承認</th>
                <th>Eラン</th>
                <th>登録確認</th>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                {{-- @unless($user->user->is_admin || $user->user->is_staff || $user->user->is_commi) --}}
                @if(isset($user->entryform) && empty($user->entryform->deleted_at))
                <tr>
                    <td>{{ @$user->id }}</td>
                    @if (isset($user->entryform->gender))
                        <td><a href="{{ route('adminentries.show', [$user->id]) }}">{{ $user->name }}</a>
                            ({{ @$user->entryform->gender }})<br>{{ @$user->entryform->furigana }}</td>
                    @else
                        <td>{{ $user->name }}<br>(申込書未作成)</td>
                    @endif
                    <td>{{ @$user->entryform->prefecture }}</td>
                    <td>{{ @$user->entryform->district }} {{ @$user->entryform->dan_name }}
                        {{ @$user->entryform->dan_number }}</td>
                    @if (isset($user->entryform->sm_confirmation))
                        <td><span class="uk-text-success">済</span></td>
                    @else
                        <td>未承認</td>
                    @endif
                    @if (isset($user->elearning->created_at))
                        <td><span class="uk-text-success">合格</span></td>
                    @else
                        <td>未修了</td>
                    @endif
                    @if (isset($user->entryform->registration_checked_at))
                        <td><span class="uk-text-success">済</span></td>
                    @else
                        <td>未</td>
                    @endif
                    <td>
                        @if ($user->id){!! Form::open(['route' => ['adminentries.destroy', $user->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                {{-- <a href="{{ route('adminentries.show', [$user->id]) }}" class='btn btn-default btn-xs'> <i class="far fa-eye"></i></a> --}}
                                <a href="{{ route('adminentries.edit', [$user->id]) }}"
                                    class='btn btn-default btn-xs'> <i class="far fa-edit"></i></a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
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
