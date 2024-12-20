{{-- {{ dd($district_counts) }} --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (isset(Auth::user()->email_verified_at))
                @include('flash::message')
                @unless (Auth::user()->is_admin || Auth::user()->is_commi || Auth::user()->is_staff)
                    <div class="card" style="width:100%;">
                        <div class="card-header">
                            <h4>各種情報</h4>
                        </div>
                        <div class="card-body">
                            {{-- @if ($configs->create_application) --}}
                            <h3 class="uk-text-large">{{ Auth()->user()->name }} さん</h3>
                            <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-lg btn-block">申込情報</a>
                            {{-- @endif --}}

                            @if ($configs->elearning && isset($user->entryForm->id))
                                <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-lg btn-block">Eラーニング</a>
                            @endif

                            @if ($configs->healthcheck && isset($user->elearning->created_at))
                                <a href="{{ url('/user/healthcheck') }}" class="btn btn-info btn-lg btn-block">健康調査票</a>
                            @endif
                        </div>
                    </div>
                @endunless
            @else
                <div class="card">
                    <h5 class="card-header text-danger">メール認証が完了していません</h5>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">{{ Auth::user()->email }}宛にメールを送信しています。<br>
                            メールに記載しているリンクから認証を完了させてください。</p>
                        <form action="{{ url('/') }}/email/verification-notification" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">認証リンクを再送する</button>
                        </form>
                        @if (session('message'))
                            <div class="text-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            {{-- 管理者のみ表示 --}}
            @if (Auth::user()->is_admin)
                <h3>地区別内訳</h3>
                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                            <th>地区</th>
                            <th>合計人数</th>
                            <th>男</th>
                            <th>女</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $countTotal = 0;
                            $countMale = 0;
                            $countFemale = 0;
                        @endphp
                        @foreach ($districtCounts as $districtCount)
                            <tr>
                                <td><a
                                        href="{{ route('adminentries.index', ['district' => $districtCount->district]) }}">{{ $districtCount->district }}</a>
                                </td>
                                <td>{{ $districtCount->total_count }}</td>
                                <td>{{ $districtCount->male_count }}</td>
                                <td>{{ $districtCount->female_count }}</td>
                            </tr>
                            @php
                                $countTotal += $districtCount->total_count;
                                $countMale += $districtCount->male_count;
                                $countFemale += $districtCount->female_count;
                            @endphp
                        @endforeach
                        <tr class="uk-text-large">
                            <td>合計</td>
                            <td>{{ $countTotal }}</td>
                            <td>{{ $countMale }}</td>
                            <td>{{ $countFemale }}</td>
                        </tr>
                    </tbody>
                </table>
            @endif
            @if (Auth::user()->is_commi)
                <h3>{{ Auth::user()->is_commi }}地区別内訳</h3>

                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                            <th>地区</th>
                            <th>合計人数</th>
                            <th>男</th>
                            <th>女</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($districtCounts as $districtCount)
                            @if ($districtCount->district == Auth::user()->is_commi)
                                <tr>
                                    <td>{{ $districtCount->district }}</td>
                                    <td>{{ $districtCount->total_count }}</td>
                                    <td>{{ $districtCount->male_count }}</td>
                                    <td>{{ $districtCount->female_count }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('entries.index') }}" class="uk-button uk-button-primary">
                    地区参加者一覧を表示
                </a>
            @endif
        </div>
    </div>
@endsection
