<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<div class="table-responsive">
    <table class="table" id="planUploads-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>氏名</th>
                <th>ファイル名</th>
                <th>uploaded</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->planupload as $value)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}<br>{{ $user->entryform->district }} {{ $user->entryform->dan_name }}
                        </td>
                        <td><a href="{{ url('/') }}/plans/{{ $value->file_path }}">{{ $value->file_path }}</a>
                        </td>
                        <td>{{ $value->created_at }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#planUploads-table').DataTable();
    });
</script>
