<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<div class="table-responsive">
    <table class="table" id="result_lists-table">
        <thead>
            <tr>
                <th>名前</th>
                <th>距離</th>
                <th>時間</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultLists as $resultList)
                    <tr>
                        <td>{{ $resultList->user->name }}</td>
                        <td>{{ $resultList->distance }}</td>
                        <td>{{ $resultList->time }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#resultLists-table').DataTable();
    });
</script>
