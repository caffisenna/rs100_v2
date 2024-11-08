@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.fixedHeader.min.js') }}"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Eラン未受講者一覧</h1>
                </div>
            </div>
            <span class="uk-text-default"><a
                    href="{{ route('uncompleted_elearning', ['q' => 'email']) }}">Emailのみを表示</a></span>
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
                                <th>名前</th>
                                <th>email</th>
                                <th>所属</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr
                                    @if (str_contains($user->memo, '遅刻')) style="background-color: yellow;"
            @elseif(str_contains($user->memo, 'キャンセル'))
                style="background-color: gray;" @endif>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->pref }}連盟 {{ $user->dist }}地区 {{ $user->dan }}団</td>
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
