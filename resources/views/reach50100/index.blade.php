@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ランキングボード</h1>
                    <p class="uk-text-success">1つ以上の歩行記録があると氏名が掲載されます</p>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('reach50100.table')

            </div>

        </div>
    </div>

@endsection
