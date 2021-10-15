@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>体温計測</h1>
                </div>
                <div class="col-sm-6">
                    @if(empty($temps))
                    <a class="btn btn-primary float-right" href="{{ route('temps.create') }}">
                        新規登録
                    </a>
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
                @include('temps.table')
            </div>

        </div>
    </div>

@endsection
