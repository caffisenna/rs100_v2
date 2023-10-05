{{-- {{ dd($car_info) }} --}}
<html lang="ja">

<head>
    <title>駐車許可証</title>
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
            line-height: 400%;
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

<body class="uk-text-center">
    <img src="{{ url('/images/rs100km_56th.png') }}" style="height:200px;">

    <p class="uk-text" style="font-size: 60pt">駐車許可証</p>

    <div class="uk-text" style="font-size: 60pt">
        交付番号: {{ $car_info->id }}
    </div>

    管理ID: {{ $car_info->uuid }}

    <p class="uk-tetx" style="font-size: 30pt">第56回東京連盟ローバースカウト100kmハイク実行委員会</p>
</body>

</html>
