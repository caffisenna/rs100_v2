@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/dataTables.fixedHeader.min.js') }}"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>備考入力あり(遅参など)</h1>
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
                    <table class="uk-table table-striped uk-table-small" id="entryForms-table">
                        <thead>
                            <tr>
                                <th>ゼッケン</th>
                                <th>名前</th>
                                <th>所属</th>
                                <th>備考</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if (isset($user->entryform))
                                    <tr>
                                        <td>{{ @$user->entryform->zekken }}</td>
                                        @if (isset($user->entryform->gender))
                                            <td><a
                                                    href="{{ route('adminentries.show', [$user->id]) }}">{{ $user->name }}</a>
                                                ({{ @$user->entryform->gender }})
                                            </td>
                                        @else
                                            <td>{{ $user->name }}<br>(申込書未作成)</td>
                                        @endif
                                        <td>{{ @$user->entryform->district }} {{ @$user->entryform->dan_name }}
                                            {{ @$user->entryform->dan_number }}</td>
                                        <td>
                                            {{ $user->entryform->memo }}
                                        </td>
                                    </tr>
                                @endif
                                {{-- @endunless --}}
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
