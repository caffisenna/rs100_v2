{{-- {{ dd($entryForm) }} --}}
<html lang="ja">

<head>
    <title>pdf output test</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/uikit.min.css') }}" media="all">
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
            line-height: 60%;
        }

        /* .main_image {
            width: 100%;
            text-align: center;
            margin: 10px 0;
        }

        .main_image img {
            width: 90%;
        } */
    </style>
</head>

<body>
    <div style="text-align:center">
        <img src="{{ url('/images/rs100km_55th.png') }}" alt="" style="height:100px;"><br>
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12NgYAAAAAMAASDVlMcAAAAASUVORK5CYII="
        alt="" height="20" width="1">
        東京連盟<br>第56回ローバースカウト100kmハイク<br>参加者ID
    </div>

    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12NgYAAAAAMAASDVlMcAAAAASUVORK5CYII="
        alt="" height="30" width="1">
    <p style="text-align:center; line-height:1em">{{ $user->entryform->prefecture }}連盟 {{ $user->entryform->district }}地区
        {{ $user->entryform->dan_name }}団<br>
        {{ $user->name }}<br>
        ゼッケン: {{ $user->entryform->zekken }}</p>

    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQI12NgYAAAAAMAASDVlMcAAAAASUVORK5CYII="
        alt="" height="10" width="1">
    <div style="text-align:center">
        <p style="font-size:small; line-height:0.8">このIDカードを拾われた方はお手数ですが<br>以下までご連絡をお願い致します。<br>
        大会本部連絡先: 03-6387-9317</p>
    </div>
</body>

</html>
