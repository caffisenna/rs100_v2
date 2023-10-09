{{-- datatables関係 --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<div class="table-responsive">
    <table class="uk-table" id="entryForms-table">
        <thead>
            <tr>
                <th>名前</th>
                <th>年代</th>
                <th>所属</th>
                <th>性別</th>
                <th>団承認</th>
                <th>確認</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entryForms as $entryForm)
                @unless($entryForm->user->is_admin || $entryForm->user->is_staff || $entryForm->user->is_commi)
                    <tr>
                        <td><a
                                href="{{ route('entries.show', [$entryForm->id]) }}">{{ $entryForm->user->name }}</a><br>{{ $entryForm->furigana }}
                        </td>
                        <td>{{ $entryForm->generation }}</td>
                        <td>{{ $entryForm->district }}地区 {{ $entryForm->dan_name }} {{ $entryForm->dan_number }}</td>
                        <td>{{ $entryForm->gender }}</td>
                        <td>
                            @if (isset($entryForm->sm_confirmation))
                                {{ $entryForm->sm_confirmation }}
                            @else
                                未承認
                            @endif
                        </td>
                        <td>
                            @if ($entryForm->user_id)
                                <div class='btn-group'>
                                    @if (empty($entryForm->commi_ok))
                                        <a href="{{ url('/commi/commi_check?id=') . $entryForm->user_id }}"
                                            class="uk-button uk-button-danger uk-button-small"
                                            onclick="return confirm('地区コミッショナーとして確認処理をしますか?')">未確認</a>
                                    @else
                                        {{ $entryForm->commi_ok }}
                                    @endif
                                </div>
                            @endif
                        </td>
                    </tr>
                @endunless
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#entryForms-table').DataTable();
    });
</script>
