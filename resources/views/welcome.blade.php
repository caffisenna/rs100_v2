<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XM1T90QY6J"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-XM1T90QY6J');
    </script>

    <title>{{ config('app.name') }}</title>

    <!-- Styles welcome.cssに追い出した-->
    <link rel="stylesheet" href="{{ url('/css/welcome.css') }}" />

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{ url('/uikit/uikit.min.css') }}" />

    <!-- UIkit JS -->
    <script src="{{ url('/uikit/uikit.min.js') }}"></script>
    <script src="{{ url('/uikit/uikit-icons.min.js') }}"></script>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ログイン</a>

                    @if (Route::has('register'))
                        {{-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">ユーザー登録</a> --}}
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="{{ url('/images/rs100km_55th.png') }}" class="logo" width="110px">
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            @auth
                            @else
                                @if (config('app.user_create') > now())
                                    <span uk-icon="icon:user; ratio:2"></span>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        <a href="{{ route('register') }}" class="underline text-gray-900 dark:text-white">
                                            ユーザー登録
                                        </a>
                                    </div>
                                @else
                                    <p class="uk-text-danger">新規ユーザー登録を終了しました</p>
                                @endif
                            @endauth
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <span uk-icon="icon:sign-in; ratio:2"></span>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                {{-- <a href="{{ route('login') }}" class="underline text-gray-900 dark:text-white">
                                    ログイン
                                </a> --}}
                                @auth
                                    <a href="{{ url('/home') }}" class="underline text-gray-900 dark:text-white">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="underline text-gray-900 dark:text-white">ログイン</a>

                                    {{-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="ml-4 underline text-gray-900 dark:text-white">Register</a>
                                    @endif --}}
                                @endauth
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <span uk-icon="icon:warning; ratio:2"></span>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="https://docs.google.com/presentation/d/e/2PACX-1vS9rKuXA7m7BIS_JFuhmIljMyzQhC56vgU5Qm6sjmP7z-8t_v0e6mQurhq5LMPuC0fhgBv-fRvxATBU/pub?start=false&loop=false&delayms=3000"
                                    target="_blank">参加申込ガイド</a>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <a href="https://rs100.info" class="uk-icon-link" uk-icon="world" ratio="2"></a>
                            <a href="https://www.facebook.com/rs100km/" class="uk-icon-link" uk-icon="facebook"
                                ratio="2"></a>
                            <a href="https://twitter.com/rs100km/" class="uk-icon-link" uk-icon="twitter"
                                ratio="2"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h5 class="uk-card-title"><span uk-icon="icon:info; ratio:1"></span>NEWS</h5>
                    <ul class="uk-list">
                        <li>2023/07/04 第56回大会に向けてテスト中です</li>
                    </ul>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h5 class="uk-card-title"><span uk-icon="icon:info; ratio:1"></span>参加条件(未定)</h5>
                    <ol>
                        <li>申込時点において加盟登録のあるローバースカウト</li>
                        <li>申込時点において加盟登録のある25歳までの指導者</li>
                        <li>他県連盟の加盟登録員 (上記の条件に当てはまるローバースカウトまたは指導者で、支部または所属連盟の承認を受けた者)</li>
                        <li>ガールスカウト及び外国連盟のスカウト (上記の条件に当てはまる25歳までのスカウトまたは指導者で加盟登録があり、支部または所属連盟の承認を受けた者)</li>
                    </ol>
                    <h3>その他</h3>
                    <p class=""><a href="{{ config('app.url') }}">大会公式サイト</a>の情報をよくご確認の上お申し込み下さい。</p>

                    <h3>個人情報の取り扱い</h3>
                    <p class="uk-text-small">入力されたデータは、ボーイスカウト東京連盟RS100kmハイク(本大会実行委員会)へ参加を申込いただいた皆様に本大会のサービス、
                        活動情報、安全管理等に関する情報を提供するために使用させていただく場合があります。<br>
                        また個人情報の保全・安全管理につきましては適切に取り扱い、大会業務終了後に破棄させていただきます。</p>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">

                    </div>
                </div>

            </div>
            <footer class="uk-text-small uk-text-center uk-margin-large-top">
                <p class="">ボーイスカウト東京連盟<br>
                    {{ config('app.name') }} &copy;</p>
            </footer>
        </div>
    </div>
</body>

</html>
