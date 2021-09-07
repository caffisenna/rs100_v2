@extends('layouts.app')
{{-- {{ dd($entryForm) }} --}}
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>参加申込書</h1>
                </div>
                @unless($entryForm->id || !$entryForm->available)
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('entryForms.create') }}">
                            {{-- <a class="btn btn-primary float-right" href="{{ url('/user/entryForms/create') }}"> --}}
                            申込書作成
                        </a>
                    </div>
                @endunless
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')
        @if (!$entryForm->available)
            <p class="text-info">申込書作成期間外です</p>
        @endif

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('entry_forms.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
