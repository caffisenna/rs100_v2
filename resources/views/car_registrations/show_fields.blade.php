<table class="uk-table">
    <tr>
        <th>運転者</th>
        <td>{{ $carRegistration->driver_name }}</td>
    </tr>
    <tr>
        <th>携帯電話番号</th>
        <td>{{ $carRegistration->cell_phone }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $carRegistration->email }}</td>
    </tr>
    <tr>
        <th>所属</th>
        <td>{{ $carRegistration->district }}地区 {{ $carRegistration->dan_name }}</td>
    </tr>
    <tr>
        <th>参加者との関係</th>
        <td>{{ $carRegistration->relation }}</td>
    </tr>
    <tr>
        <th>カーナンバー</th>
        <td>{{ $carRegistration->car_number }}</td>
    </tr>
    <tr>
        <th>申請日</th>
        <td>{{ $carRegistration->created_at }}</td>
    </tr>
    <tr>
        <th>更新日</th>
        <td>{{ $carRegistration->updated_at }}</td>
    </tr>
    <tr>
        <th>uuid</th>
        <td>{{ $carRegistration->uuid }}</td>
    </tr>
    <tr>
        <th>発行日</th>
        <td>{{ $carRegistration->published_at }}</td>
    </tr>
</table>
