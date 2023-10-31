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
                            @endif
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>ゼッケン</td>
                <td>
                    @if ($entryForm->zekken)
                        {{ $entryForm->zekken }}
                    @else
                        後日公開
                    @endif
                </td>
            </tr>
            <tr>
                <td>団の承認</td>
                @if (isset($entryForm->sm_confirmation))
                    <td>{{ $entryForm->sm_confirmation }}</td>
                @else
                    <td> <span class="uk-text-danger">未承認(今後団で承認手続きが行われます)</span></td>
                @endif
            </tr>
            <tr>
                <td>Eラーニング</td>
                @if (isset($entryForm->elearning))
                    <td>{{ $entryForm->elearning }}</td>
                @else
                    <td> <span class="uk-text-danger">未修了(今後受講が可能になります)</span></td>
                @endif
            </tr>
            <tr>
                <td>健康調査票</td>
                <td>Eラーニングの修了証が兼務します</td>
            </tr>
            <tr>
                <td>IDカード</td>
                <td>
                    @if ($entryForm->id)
                        <a href="{{ url('/user/id_card') }}" target="_blank">ダウンロード</a><br>
                        (表示されるPDFを各端末にダウンロードしてから印刷してください)
                        {{-- 後日公開予定 --}}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
