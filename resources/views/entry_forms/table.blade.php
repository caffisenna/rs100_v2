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
                <td>{{ $entryForm->sm_confirmation }}</td>
            </tr>
            <tr>
                <td>コース概略</td>
                <td>{{ $entryForm->map_upload }}</td>
            </tr>
            <tr>
                <td>Eラーニング合格</td>
                <td>{{ $entryForm->elearning }}</td>
            </tr>
        </tbody>
    </table>
</div>
