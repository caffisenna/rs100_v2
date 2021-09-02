<div class="table-responsive">
    <table class="table" id="elearnings-table">
        <thead>
            <tr>
                <th colspan="3">アクション</th>
            </tr>
        </thead>
        <tbody>
        {{-- @foreach($elearnings as $elearning) --}}
            <tr>
                <td width="120">
                    @if($elearning->id)
                    <p class="text-success">Eラーニングを受講済みです</p>
                    {!! Form::open(['route' => ['elearnings.destroy', $elearning->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="far fa-trash-alt"></i>受講歴を削除する', ['type' => 'submit', 'class' => 'btn btn-danger btn-lg', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        {{-- @endforeach --}}
        </tbody>
    </table>
</div>
