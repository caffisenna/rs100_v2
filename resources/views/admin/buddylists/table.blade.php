<script type="text/javascript" charset="utf8" src="{{ url('/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('/datatables/dataTables.fixedHeader.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/datatables/jquery.dataTables.css') }}">
<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#buddylists-table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#buddylists-table thead');

        var table = $('#buddylists-table').DataTable({
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
    <table class="uk-table uk-table-divider uk-table-hover" id="buddylists-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>バディ1</th>
                <th>バディ2</th>
                <th>バディ3</th>
                <th>バディ4</th>
                <th>バディ5</th>
                <th>確認日時</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="uk-text-small">
            @foreach ($buddylists as $buddylist)
                @if (isset($buddylist->id))
                    <tr>
                        <td>{{ $buddylist->id }}</td>
                        <td>
                            @if (isset($buddylist->person1Form->zekken))
                                {{ $buddylist->person1Form->zekken }}<br>
                                @if ($buddylist->person1Form->gender === '女')
                                    <span class="uk-text-danger">{{ $buddylist->person1Form->user->name }}</span>
                                @else
                                    {{ $buddylist->person1Form->user->name }}
                                @endif
                                ({{ $buddylist->person1Form->gender }})
                                <br>{{ $buddylist->person1Form->dan_name }}
                            @endif
                        </td>
                        <td>
                            @if (isset($buddylist->person2Form->zekken))
                                {{ $buddylist->person2Form->zekken }}<br>
                                @if ($buddylist->person2Form->gender === '女')
                                    <span class="uk-text-danger">{{ $buddylist->person2Form->user->name }}</span>
                                @else
                                    {{ $buddylist->person2Form->user->name }}
                                @endif
                                ({{ $buddylist->person2Form->gender }})<br>{{ $buddylist->person2Form->dan_name }}
                            @endif
                        </td>
                        <td>
                            @if (isset($buddylist->person3Form->zekken))
                                {{ $buddylist->person3Form->zekken }}<br>
                                @if ($buddylist->person3Form->gender === '女')
                                    <span class="uk-text-danger">{{ $buddylist->person3Form->user->name }}</span>
                                @else
                                    {{ $buddylist->person3Form->user->name }}
                                @endif
                                ({{ $buddylist->person3Form->gender }})<br>{{ $buddylist->person3Form->dan_name }}
                            @endif
                        </td>
                        <td>
                            @if (isset($buddylist->person4Form->zekken))
                                {{ $buddylist->person4Form->zekken }}<br>
                                @if ($buddylist->person4Form->gender === '女')
                                    <span class="uk-text-danger">{{ $buddylist->person4Form->user->name }}</span>
                                @else
                                    {{ $buddylist->person4Form->user->name }}
                                @endif
                                ({{ $buddylist->person4Form->gender }})<br>{{ $buddylist->person4Form->dan_name }}
                            @endif
                        </td>
                        <td>
                            @if (isset($buddylist->person5Form->zekken))
                                {{ $buddylist->person5Form->zekken }}<br>
                                @if ($buddylist->person5Form->gender === '女')
                                    <span class="uk-text-danger">{{ $buddylist->person5Form->user->name }}</span>
                                @else
                                    {{ $buddylist->person5Form->user->name }}
                                @endif
                                ({{ $buddylist->person5Form->gender }})<br>{{ $buddylist->person5Form->dan_name }}
                            @endif
                        </td>
                        <td>{{ $buddylist->confirmed }}</td>
                        <td>
                            {!! Form::open(['route' => ['buddylists.destroy', $buddylist->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ url('/admin/buddy_confirm/?q=') }}{{ $buddylist->id }}"
                                    class="uk-button uk-button-default"
                                    onclick="return confirm('{{ $buddylist->id }}を承認しますか?')">確認</a>
                                <a href="{{ route('buddylists.edit', [$buddylist->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('本当に削除しますか?')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#buddylists-table').DataTable();
    });
</script>
