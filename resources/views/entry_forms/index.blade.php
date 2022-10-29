@extends('layouts.app')
{{-- {{ dd($entryForm) }} --}}
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>参加申込</h1>
                </div>
                @unless(isset($entryForm->id) || !$entryForm->available)
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
            <p class="text-info">期間外のため、参加者自身による参加取り消しはできません。<br>
                <a href="mailto:register.rs100km@gmail.com">register.rs100km@gmail.com</a>までお問い合わせください。</p>
        @endif

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('entry_forms.table')
            </div>

        </div>
    </div>

@endsection
