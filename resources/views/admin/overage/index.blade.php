@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/datatables/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ url('/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('/datatables/dataTables.fixedHeader.min.js') }}"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>オーバーエイジ一覧</h1>
                </div>
            </div>
            <span class="uk-text-default">以下の一覧は生年月日を基準に年齢計算をして、本番当日に25歳以上の方をリストしています。<br>
                一覧の中で「現役」の表記がある方は要チェック。</span>
        </div>
    </section>

    <div class="content px-3">

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="uk-table uk-table-striped" id="entryForms-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>所属</th>
                                <th>生年月日</th>
                                <th>年代</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                                @unless ($entry->user->is_admin || $entry->user->is_staff || $entry->user->is_commi)
                                    <tr>
                                        <td>{{ $entry->user->id }}</td>
                                        <td>{{ $entry->user->name }}({{ $entry->gender }})<br>
                                            {{ $entry->furigana }}</td>
                                        <td>{{ $entry->district }} {{ $entry->dan_name }}
                                            {{ $entry->dan_number }}</td>
                                        <td>
                                            <span class="uk-text-small">
                                                {{ \Carbon\Carbon::parse($entry->birth_day)->age }}歳<br>
                                                {{ $entry->birth_day->format('Y-m-d') }}
                                            </span>
                                        </td>
                                        <td><span class="uk-text-small">{{ $entry->generation }}</span></td>
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

            </div>

        </div>
    </div>
@endsection
