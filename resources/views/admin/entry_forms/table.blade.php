<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<div class="table-responsive">
    <table class="table" id="entryForms-table">
        <thead>
            <tr>
                <th>名前</th>
                <th>所属</th>
                <th>登録確認</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entryForms as $entryForm)
                @unless($entryForm->user->is_admin || $entryForm->user->is_staff || $entryForm->user->is_commi)
                    <tr>
                        <td><a href="{{ route('adminentries.show', [$entryForm->id]) }}">{{ $entryForm->user->name }}</a> ({{ $entryForm->gender }})<br>{{ $entryForm->furigana }}</td>
                        <td>{{ $entryForm->district }} {{ $entryForm->dan_name }} {{ $entryForm->dan_number }}</td>
                        <td><span class="uk-text-small">{{ $entryForm->hq_confirmation }}</span></td>
                        <td>@if ($entryForm->id){!! Form::open(['route' => ['adminentries.destroy', $entryForm->id], 'method' => 'delete']) !!}<div class='btn-group'><a href="{{ route('adminentries.show', [$entryForm->id]) }}" class='btn btn-default btn-xs'> <i class="far fa-eye"></i></a><a href="{{ route('adminentries.edit', [$entryForm->id]) }}" class='btn btn-default btn-xs'> <i class="far fa-edit"></i></a>{!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}</div>{!! Form::close() !!}@endif</td>
                    </tr>
                @endunless
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#entryForms-table').DataTable();
    });
</script>
