@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.fixedHeader.min.js') }}"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>申込削除者一覧</h1>
                </div>
            </div>
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
                                <th>ゼッケン</th>
                                <th>名前</th>
                                <th>所属</th>
                                <th>備考</th>
                                <th>削除日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entryForms as $entryForm)
                                @unless ($entryForm->user->is_admin || $entryForm->user->is_staff || $entryForm->user->is_commi)
                                    <tr>
                                        <td>{{ $entryForm->zekken }}</td>
                                        <td>{{ $entryForm->user->name }}({{ $entryForm->gender }})<br>
                                            {{ $entryForm->furigana }}</td>
                                        <td>{{ $entryForm->district }} {{ $entryForm->dan_name }}
                                            {{ $entryForm->dan_number }}</td>
                                        <td><span class="uk-text-small">{{ $entryForm->memo }}</span></td>
                                        <td><span class="uk-text-small">{{ $entryForm->deleted_at }}</span></td>
                                    </tr>
                                @endunless
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
