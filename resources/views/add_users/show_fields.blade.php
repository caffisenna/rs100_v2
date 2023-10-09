<table class="uk-table uk-table-responsive">
    <tr>
        <th>氏名</th>
        <td>{{ $addUsers->name }}</td>
    </tr>
    <tr>
        <th>email</th>
        <td>{{ $addUsers->email }}</td>
    </tr>
    <tr>
        <th>種別</th>
        <td>{{ $addUsers->role }}</td>
    </tr>
    <tr>
        <th>地区</th>
        <td>{{ $addUsers->district }}</td>
    </tr>
    <tr>
        <th>メール認証</th>
        <td>{{ $addUsers->email_verified_at }}</td>
    </tr>
    <tr>
        <th>作成日</th>
        <td>{{ $addUsers->created_at }}</td>
    </tr>
    <tr>
        <th>更新日</th>
        <td>{{ $addUsers->updated_at }}</td>
    </tr>
</table>
