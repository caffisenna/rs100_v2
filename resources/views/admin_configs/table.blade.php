<div class="table-responsive">
    <table class="table" id="adminConfigs-table">
        <thead>
            <tr>
                <th>アカウント作成</th>
                <th>申込書作成</th>
                <th>Eラーニング</th>
                <th>健康調査票</th>
                <th>ユーザー編集</th>
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
                    <td width="120">
                        {{-- {!! Form::open(['route' => ['adminConfigs.destroy', $adminConfig->id], 'method' => 'delete']) !!} --}}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('adminConfigs.show', [$adminConfig->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            <a href="{{ route('adminConfigs.edit', [$adminConfig->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                        </div>
                        {{-- {!! Form::close() !!} --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
