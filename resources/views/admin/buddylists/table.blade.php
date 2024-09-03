<link rel="stylesheet" type="text/css" href="{{ asset('datatables/jquery.dataTables.css') }}">
<script type="text/javascript" charset="utf8" src="{{ asset('datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('datatables/dataTables.fixedHeader.min.js') }}"></script>
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

                        {{-- バディ1-5をforで表示 --}}
                        @for ($i = 1; $i <= 5; $i++)
                            <td>
                                @php
                                    $personData = $buddylist->{"person$i" . 'Form'};
                                @endphp

                                @if (isset($personData->zekken))
                                    {{ $personData->zekken }}<br>
                                    @if ($personData->gender === '女')
                                        <span class="uk-text-danger">{{ $personData->user->name }}</span>
                                    @else
                                        {{ $personData->user->name }}
                                    @endif
                                    ({{ $personData->gender }})
                                    <br>{{ $personData->dan_name }}
                                @endif
                            </td>
                        @endfor
                        {{-- バディ1-5をforで表示 --}}

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
