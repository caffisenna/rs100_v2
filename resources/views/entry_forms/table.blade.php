<div class="table-responsive">
    <table class="table" id="entryForms-table">
        <tbody>
            <tr>
                <td>申込書作成日</td>
                <td>{{ $entryForm->created_at }}</td>
            </tr>
            <tr>
                <td>申込書</td>
                <td>
                    @if ($entryForm->id)
                        {!! Form::open(['route' => ['entryForms.destroy', $entryForm->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('entryForms.show', [$entryForm->id]) }}" class='btn btn-default btn-lg'>
                                <i class="far fa-eye"></i>確認する
                            </a>
                            <a href="{{ route('entryForms.edit', [$entryForm->id]) }}" class='btn btn-default btn-lg'>
                                <i class="far fa-edit"></i>編集する
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>削除する', ['type' => 'submit', 'class' => 'btn btn-danger btn-lg', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            <tr>
                <td>隊の承認</td>
                @if (isset($entryForm->sm_confirmation))
                    <td>{{ $entryForm->sm_confirmation }}</td>
                @else
                    <td> <span class="uk-text-danger">未承認</span></td>
                @endif
            </tr>
            <tr>
                <td>コース概略</td>
                @if (isset($entryForm->plan_upload))
                    <td>{{ $entryForm->plan_upload }}</td>
                @else
                    <td> <span class="uk-text-danger">アップロードされていません</span></td>
                @endif
            </tr>
            <tr>
                <td>Eラーニング修了</td>
                @if (isset($entryForm->elearning))
                    <td>{{ $entryForm->elearning }}</td>
                @else
                    <td> <span class="uk-text-danger">未修了</span></td>
                @endif
            </tr>
        </tbody>
    </table>
</div>
