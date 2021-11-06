<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<div class="table-responsive">
    <table class="table" id="planUploads-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>氏名</th>
                <th>ファイル名</th>
                <th>参加形態</th>
                <th>check</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->planupload as $value)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}<br>{{ @$user->entryform->district }} {{ @$user->entryform->dan_name }}
                        </td>
                        <td><a href="{{ url('/') }}/plans/{{ $value->file_path }}">{{ $value->file_path }}</a>
                        </td>
                        <td class="uk-text-small">
                        @switch(@$user->entryform->how_to_join)
                            @case(1)
                                両日参加(両日とも7:00〜10:00までにスタート)
                            @break
                            @case(2)
                                両日参加(初日7:00〜10:00までにスタートかつ 2日目10:00以降スタート)
                            @break
                            @case(3)
                                両日参加(初日10:00以降スタート かつ 2日目7:00〜10:00までにスタート)
                            @break
                            @case(4)
                                両日参加(両日とも10:00以降にスタート)
                            @break
                            @case(5)
                                1日目だけ参加(7:00〜10:00までにスタート)
                            @break
                            @case(6)
                                1日目だけ遅参(10:00以降にスタート)
                            @break
                            @case(7)
                                2日目だけ参加(7:00〜10:00までにスタート)
                            @break
                            @case(8)
                                2日目だけ遅参(10:00以降にスタート)
                            @break
                        @endswitch
                        </td>
                        @if (isset($value->checked_at))
                            <td><span class="uk-text-success">済</td>
                        @else
                            <td><a href="{{ url("/plan_check?id=$value->id") }}"
                                    onclick="return confirm('この歩行計画をチェック済みにしますか?')">check</a></td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#planUploads-table').DataTable();
    });
</script>
