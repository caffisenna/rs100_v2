<div class="table-responsive">
    <div class='btn-group'>
        <a href="{{ route('adminConfigs.edit', [$adminConfigs->id]) }}" class='btn btn-default btn-lg'>
            <i class="far fa-edit"></i>
        </a>
    </div>
    <table class="uk-table uk-table-striped col-sm-6" id="adminConfigs-table">
        <tr>
            <th>機能</td>
            <td>状態</td>
        </tr>
        <tr>
            <th>アカウント作成</td>
            <td>{{ $adminConfigs->create_account }}</td>
        </tr>
        <tr>
            <th>申込書作成</th>
            <td>{{ $adminConfigs->create_application }}</td>
        </tr>
        <tr>
            <th>Eラーニング</th>
            <td>{{ $adminConfigs->elearning }}</td>
        </tr>
        <tr>
            <th>計画書アップ</th>
            <td>{{ $adminConfigs->healthcheck }}</td>
        </tr>

        <tr>
            <th>ユーザー編集</th>
            <td>{{ $adminConfigs->user_edit }}</td>
        </tr>
        <tr>
            <th>画像UP</th>
            <td>{{ $adminConfigs->user_upload }}</td>
        </tr>
        <tr>
            <th>ステータス入力(day1)</th>
            <td>{{ $adminConfigs->status_day1 }}</td>
        </tr>
        <tr>
            <th>ステータス入力(day2)</th>
            <td>{{ $adminConfigs->status_day2 }}</td>
        </tr>
        <tr>
            <th>ステータスリンク</th>
            <td>{{ $adminConfigs->show_status_link }}</td>
        </tr>
    </table>
</div>
