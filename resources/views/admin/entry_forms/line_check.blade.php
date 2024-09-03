@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/dataTables.fixedHeader.min.js') }}"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>LINE登録チェック</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="uk-table table-striped" id="entryForms-table">
                        <thead>
                            <tr>
                                <th>ゼッケン</th>
                                <th>名前</th>
                                <th>登録</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if (isset($user->entryform->zekken))
                                    <tr>
                                        <td>{{ $user->entryform->zekken }}</td>

                                        <td><a href="{{ route('adminentries.show', [$user->id]) }}">{{ $user->name }}</a>
                                            ({{ @$user->entryform->gender }})
                                            <br>{{ @$user->entryform->furigana }}
                                        </td>
                                        <td>
                                            @if (empty($user->entryform->line_checked_at))
                                                <a href="{{ url('/admin/line_check?id=') . $user->entryform->id }}"
                                                    class="uk-button uk-button-danger uk-button-small"
                                                    onclick="return confirm('LINE登録OK?')">未確認</a>
                                            @else
                                                登録済み
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#entryForms-table').DataTable();
        });
    </script>
@endsection
