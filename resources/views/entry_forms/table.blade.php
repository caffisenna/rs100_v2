<div class="table-responsive">
    <table class="table" id="entryForms-table">
        <tbody>
            <tr>
                <td>作成日</td>
                @if (isset($entryForm->created_at))
                    <td>{{ $entryForm->created_at }}</td>
                @else
                    <td> <span class="uk-text-danger">未作成</span></td>
                @endif
            </tr>
            <tr>
                <td>操作</td>
                <td>
                    @if (isset($entryForm->id))
                        {{-- {!! Form::open(['route' => ['entryForms.destroy', $entryForm->id], 'method' => 'delete']) !!} --}}
                        <div class='btn-group'>
                            <a href="{{ url('/user/pdf') }}" class='btn btn-default btn-lg'>
                                <span uk-icon="download"></span>PDF
                            </a>
                            <a href="{{ route('entryForms.show', [$entryForm->id]) }}" class='btn btn-default btn-lg'>
                                <i class="far fa-eye"></i>確認
                            </a>
                            @if ($configs->user_edit != 0)
                                <a href="{{ route('entryForms.edit', [$entryForm->id]) }}"
                                    class='btn btn-default btn-lg'>
                                    <i class="far fa-edit"></i>編集
                                </a>

                                {{-- {!! Form::button('<i class="far fa-trash-alt"></i>削除する', ['type' => 'submit', 'class' => 'btn btn-danger btn-lg', 'onclick' => "return confirm('本当に削除しますか?')"]) !!} --}}
                            @endif
                        </div>
                        {{-- {!! Form::close() !!} --}}
                    @endif
                </td>
            </tr>
            <tr>
                <td>ゼッケン</td>
                <td>{{ $entryForm->zekken }}</td>
            </tr>
            <tr>
                <td>団の承認</td>
                @if (isset($entryForm->sm_confirmation))
                    <td>{{ $entryForm->sm_confirmation }}</td>
                @else
                    <td> <span class="uk-text-danger">未承認</span></td>
                @endif
            </tr>
            <tr>
                <td>Eラーニング</td>
                @if (isset($entryForm->elearning))
                    <td>{{ $entryForm->elearning }}</td>
                @else
                    <td> <span class="uk-text-danger">未修了</span></td>
                @endif
            </tr>
            <tr>
                <td>IDカード</td>
                <td>
                    @if ($entryForm->id)
                        <a href="{{ url('/user/id_card') }}">ダウンロード</a>
                    @endif
                </td>
            </tr>
            {{-- <tr>
                <td>健康調査書</td>
                @if (isset($entryForm->plan_upload))
                    <td>{{ $entryForm->plan_upload }}</td>
                @else
                    <td> <span class="uk-text-danger">アップロードされていません</span></td>
                @endif
            </tr> --}}
        </tbody>
    </table>
</div>
