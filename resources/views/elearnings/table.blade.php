<div class="table-responsive">
    <table class="table" id="elearnings-table">
        <thead>
            <tr>
                <th colspan="3">操作</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($elearnings as $elearning) --}}
            <tr>
                <td width="120">
                    @if ($elearning->id)
                        <p class="text-success">Eラーニングを受講済みです</p>
                        <a href="{{ url('/user/healthcheck') }}" class="uk-button uk-button-primary uk-button-large">
                            <span uk-icon="file-pdf"></span>健康調査票兼Eラーニング修了証をダウンロード</a>
                            <p class=""></p>
                        {!! Form::open(['route' => ['elearnings.destroy', $elearning->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {!! Form::button('<i class="far fa-trash-alt"></i>受講歴を削除する', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-lg',
                                'onclick' => "return confirm('本当に受講歴を削除しますか?(再受講が必要になります。)')",
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
