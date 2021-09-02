<div class="table-responsive">
    <table class="table" id="entryForms-table">
        <thead>
            <tr>
                <th colspan="3">操作</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($entryForms as $entryForm) --}}
                <tr>
                    <td width="120">
                        @if($entryForm->id)
                        {!! Form::open(['route' => ['entryForms.destroy', $entryForm->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('entryForms.show', [$entryForm->id]) }}"
                                class='btn btn-default btn-lg'>
                                <i class="far fa-eye"></i>確認する
                            </a>
                            <a href="{{ route('entryForms.edit', [$entryForm->id]) }}"
                                class='btn btn-default btn-lg'>
                                <i class="far fa-edit"></i>編集する
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>削除する', ['type' => 'submit', 'class' => 'btn btn-danger btn-lg', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
