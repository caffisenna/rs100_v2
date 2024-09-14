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

    <title>{{ config('app.name') }}1</title>

    <!-- Styles welcome.cssに追い出した-->
    <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}" />

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{ asset('/uikit/uikit.min.css') }}" />

    <!-- UIkit JS -->
    <script src="{{ asset('/uikit/uikit.min.js') }}"></script>
    <script src="{{ asset('/uikit/uikit-icons.min.js') }}"></script>
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
                <img src="{{ url('/images/rs100km.png') }}" class="logo" width="132px">
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
                                @auth
                                    <a href="{{ url('/home') }}" class="underline text-gray-900 dark:text-white">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="underline text-gray-900 dark:text-white">ログイン</a>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <span uk-icon="icon:warning; ratio:2"></span>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="#" target="_blank">参加申込ガイド5</a>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <a href="https://rs100.scout.tokyo/" class="uk-icon-link" uk-icon="world"
                                ratio="2"></a>
                            <a href="https://www.facebook.com/rs100km/" class="uk-icon-link" uk-icon="facebook"
                                ratio="2"></a>
                            <a href="https://twitter.com/rs100km/" class="uk-icon-link" uk-icon="twitter"
                                ratio="2"></a>
                            <a href="https://www.instagram.com/rs100km/?hl=ja" class="uk-icon-link" uk-icon="instagram"
                                ratio="2"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h5 class="uk-card-title"><span uk-icon="icon:info; ratio:1"></span>NEWS</h5>
                    <ul class="uk-list">
                        <li>2024/09/2 第{{ config('app.number_of_times') }}回大会 に向けてテストを開始</li>
                    </ul>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h5 class="uk-card-title"><span uk-icon="icon:info; ratio:1"></span>参加条件</h5>
                    <ol>
                        <li>申込時点において東京連盟に加盟登録のあるローバースカウトおよび同年代指導者</li>
                        <li>他県連盟の加盟登録員 (ローバースカウトまたは25歳までの指導者で、所属県連盟、地区及び団の承認を受けた者)</li>
                        <li>ガールスカウト及び外国連盟のスカウト (25歳までのスカウトまたは指導者で加盟登録があり、支部または所属連盟の承認を受けた者)</li>
                    </ol>
                    <h3>注意事項</h3>
                    <ul>
                        <li>スタートは初日16時までの遅刻スタートを認めます(要事前連絡)。</li>
                        <li>女性の参加者については安全管理の面より、スタートから朝6:00までは男性1名を含む2人組または3人組で行動することとします (申込時にバディが組めない場合は参加申込フォームに
                            入力する)。</li>
                        <li>申し込み後に実施されるeラーニングを受講しなかった者及び当日健康調査書を提出しなかった者はハイクに参加できませんので、ご注意ください。</li>

                    </ul>
                    <h3>その他</h3>
                    <p class=""><a href="https://rs100.scout.tokyo">大会公式サイト</a>の情報をよくご確認の上お申し込み下さい。</p>

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
