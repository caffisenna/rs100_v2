<html lang="ja">

<head>
    <title>100kmハイク 参加IDカード</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ url('uikit/uikit.min.css') }}" media="all">
    <style>
        @font-face {
            font-family: migmix;
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/migmix-2p-regular.ttf') }}") format('truetype');
            /* src: url("{{ storage_path('fonts/ipag.ttf') }}") format('truetype'); */
        }

        /* @font-face {
            font-family: migmix;
            font-style: bold;
            font-weight: bold;
            src: url("{{ storage_path('fonts/migmix-2p-bold.ttf') }}") format('truetype');
        } */

        body {
            font-family: migmix;
            /* line-height: 30%; */
        }

        /* .main_image {
            width: 100%;
            text-align: center;
            margin: 10px 0;
        }

        .main_image img {
            width: 90%;
        } */

        #container {
            display: flex;
        }

        #text {
            flex: 1;
        }

        #img {
            width: 100px;
        }
    </style>
</head>

<body class="uk-margin-remove">
    <div>
        <div class="uk-text-center" style="margin-top:-20px;">
            <span class="uk-text-large" style="line-height:0.8">ボーイスカウト東京連盟<br>第56回ローバースカウト100kmハイク</span>
        </div>
    </div>
    <div class="uk-margin-top">
        <p style="text-align:center; line-height:1em">{{ $user->entryform->prefecture }}連盟
            {{ $user->entryform->district }}地区
            {{ $user->entryform->dan_name }}団<br>
            {{ $user->name }}<br>
            @if (!$user->entryform->zekken)
                ゼッケン: 123
            @else
                ゼッケン: {{ $user->entryform->zekken }}
            @endif
        </p>
    </div>
    <hr>
    <div class="fixed-bottom" id="container" style="margin-top:10px; bottom:0;">
        <div id="text">
            <p class="uk-text-small" style="line-height:0.8;">このIDカードを拾われた方は<br>以下までご連絡をお願い致します。<br>大会本部連絡先:
                03-6387-9317</p>
        </div>
        <div id="img" style="float:right; margin-top:-90px;">
            <img src="{{ url('/images/rs100km_56th.png') }}">
        </div>
    </div>

</body>

</html>
