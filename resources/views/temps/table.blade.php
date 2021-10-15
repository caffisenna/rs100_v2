<div class="table-responsive">
    <table class="uk-table" id="temps-table">
        <tr>
            <th>11/13(土)開始前</th>
            <td><span class="@if(@$temps->temp_day1_before == "37.5度以上")uk-text-danger @endif">{{ @$temps->temp_day1_before }}</span></td>
        </tr>
        <tr>
            <th>11/13(土)終了後</th>
            <td><span class="@if(@$temps->temp_day1_after == "37.5度以上")uk-text-danger @endif">{{ @$temps->temp_day1_after }}</span></td>
        </tr>
        <tr>
            <th>11/14(日)開始前</th>
            <td><span class="@if(@$temps->temp_day2_before == "37.5度以上")uk-text-danger @endif">{{ @$temps->temp_day2_before }}</span></td>
        </tr>
        <tr>
            <th>11/14(日)終了後</th>
            <td><span class="@if(@$temps->temp_day2_after == "37.5度以上")uk-text-danger @endif">{{ @$temps->temp_day2_after }}</span></td>
        </tr>
    </table>
</div>
<div>
@if (isset($temps))
    {!! Form::open(['route' => ['temps.destroy', $temps->id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <a href="{{ route('temps.edit', [$temps->id]) }}" class='btn btn-default'>
            <i class="far fa-edit">追記する</i>
        </a>
        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
    </div>
    {!! Form::close() !!}
@endif
</div>
