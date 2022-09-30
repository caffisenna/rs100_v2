<div class="table-responsive">
    <table class="table" id="buddylists-table">
        <thead>
            <tr>
                <th>バディ1</th>
                <th>バディ2</th>
                <th>バディ3</th>
                <th>確認日時</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buddylists as $buddylist)
                <tr>
                    <td>{{ $buddylist->person1 }}</td>
                    <td>{{ $buddylist->person2 }}</td>
                    <td>{{ $buddylist->person3 }}</td>
                    <td>{{ $buddylist->confirmed }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['buddylists.destroy', $buddylist->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('buddylists.show', [$buddylist->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
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
