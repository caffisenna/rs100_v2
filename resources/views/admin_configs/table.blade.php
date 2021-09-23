<div class="table-responsive">
    <table class="table" id="adminConfigs-table">
        <thead>
            <tr>
                <th>アカウント作成</th>
                <th>申込書作成</th>
                <th>Eラーニング</th>
                <th>健康調査票</th>
                <th>ユーザー編集</th>
                <th>画像UP</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adminConfigs as $adminConfig)
                <tr>
                    <td>{{ $adminConfig->create_account }}</td>
                    <td>{{ $adminConfig->create_application }}</td>
                    <td>{{ $adminConfig->elearning }}</td>
                    <td>{{ $adminConfig->healthcheck }}</td>
                    <td>{{ $adminConfig->user_edit }}</td>
                    <td>{{ $adminConfig->user_upload }}</td>
                    <td width="120">
                        <div class='btn-group'>
                            <a href="{{ route('adminConfigs.edit', [$adminConfig->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
