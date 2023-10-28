@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/datatables/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ url('/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('/datatables/dataTables.fixedHeader.min.js') }}"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>未チェックイン</h1>
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
                    <table class="uk-table uk-table-striped" id="entryForms-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>所属</th>
                                <th>ゼッケン</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->user->id }}</td>
                                    <td>
                                        {{ $user->user->name }}({{ $user->gender }})<br>
                                        <span class="uk-text-small">{{ $user->furigana }}</span>
                                    </td>
                                    <td>
                                        {{ $user->district }} {{ $user->dan_name }}
                                        {{ $user->dan_number }}
                                    </td>
                                    <td>{{ $user->zekken }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
