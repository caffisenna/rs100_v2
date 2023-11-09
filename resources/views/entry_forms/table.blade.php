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
                    <td>修了済み</td>
                @else
                    <td>
                        @if ($configs->elearning)
                            <a href="{{ url('/user/elearnings') }}" class="uk-button uk-button-primary">受講する</a>
                        @else
                            <span class="uk-text-danger">未修了(今後受講が可能になります)</span>
                        @endif
                    </td>
                @endif
            </tr>
            <tr>
                <td>健康調査票</td>
                @if (isset($entryForm->elearning))
                    <td>
                        <a href="{{ url('/user/healthcheck') }}" class="uk-button uk-button-primary">ダウンロード</a>
                    </td>
                @else
                    <td><span class="uk-text-warning">Eラーニング修了後にダウンロードできるようになります</span></td>
                @endif
            </tr>
            <tr>
                <td>IDカード</td>
                <td>
                    @if ($entryForm->id)
                        <a href="{{ url('/user/id_card') }}" target="_blank"
                            class="uk-button uk-button-primary">ダウンロード</a><br>
                        (表示されるPDFを各端末にダウンロードしてから印刷してください)
                    @endif
                </td>
            </tr>
            <tr>
                <td>バディ情報</td>
                @if (isset($bd))
                    <td>
                        @foreach ($bd as $person)
                            {{ $person->user->name }}({{ $person->gender }})<br>
                            {{ $person->prefecture }}連盟
                            {{ isset($person->district) ? $person->district . '地区' : '' }}
                            {{ isset($person->dan_name) ? $person->dan_name . '団' : '' }}
                            <hr>
                        @endforeach
                    </td>
                @else
                    <td>男性での単独歩行、もしくは女性を含まない男性同士のバディ情報は割愛しています</td>
                @endif
            </tr>
        </tbody>
    </table>
</div>
