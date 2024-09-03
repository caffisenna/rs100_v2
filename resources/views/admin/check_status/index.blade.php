@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.fixedHeader.min.js') }}"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if ($cat == 'commi')
                        <h1>地区コミ未確認一覧</h1>
                    @elseif ($cat == 'dan')
                        <h1>団未承認一覧</h1>
                    @endif
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
                    <table class="uk-table uk-table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>地区</th>
                                <th>所属</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->user->name }}({{ $user->gender }})<br>
                                        {{ $user->furigana }}</td>
                                    <td>{{ $user->district }}</td>
                                    <td>{{ $user->dan_name }}</td>
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
            $('#users-table').DataTable();
        });
    </script>
@endsection
