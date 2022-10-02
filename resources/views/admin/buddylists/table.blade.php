<div class="table-responsive">
    <table class="uk-table uk-table-small uk-table-divider uk-table-hover" id="buddylists-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>バディ1</th>
                <th>バディ2</th>
                <th>バディ3</th>
                <th>確認日時</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody class="uk-text-small">
            @foreach ($buddylists as $buddylist)
                <tr>
                    <td>{{ $buddylist->id }}</td>
                    <td>{{ $buddylist->person1 }}<br>
                        @if ($buddylist->person1_gender == '女')
                            <span class="uk-text-danger">{{ $buddylist->person1_name }}</span>
                        @else
                            {{ $buddylist->person1_name }}
                        @endif
                        ({{ $buddylist->person1_gender }})<br>{{ $buddylist->person1_dan_name }}
                    </td>
                    <td>{{ $buddylist->person2 }}<br>
                        @if ($buddylist->person2_gender == '女')
                            <span class="uk-text-danger">{{ $buddylist->person2_name }}</span>
                        @else
                            {{ $buddylist->person2_name }}
                        @endif
                        ({{ $buddylist->person2_gender }})<br>{{ $buddylist->person2_dan_name }}
                    </td>
                    </td>
                    <td>{{ $buddylist->person3 }}<br>
                        @if ($buddylist->person3_gender == '女')
                            <span class="uk-text-danger">{{ $buddylist->person3_name }}</span>
                        @else
                            {{ $buddylist->person3_name }}
                        @endif
                        ({{ $buddylist->person3_gender }})<br>{{ $buddylist->person3_dan_name }}
                    </td>
                    </td>
                    <td>{{ $buddylist->confirmed }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['buddylists.destroy', $buddylist->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('buddylists.edit', [$buddylist->id]) }}" class='btn btn-default btn-xs'>
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
            @endforeach
        </tbody>
    </table>
</div>
