<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZXVS5PSFJK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ZXVS5PSFJK');
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome/all.min.css') }}" />

    <link href="{{ asset('css/bootstrap4-toggle.min.css') }}" rel="stylesheet">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}" />

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    @yield('third_party_stylesheets')
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{ asset('uikit/uikit.min.css') }}" />

    <!-- UIkit JS -->
    <script src="{{ asset('uikit/uikit.min.js') }}"></script>
    <script src="{{ asset('uikit/uikit-icons.min.js') }}"></script>


    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (!Auth::guest())
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('images/rs100km.png') }}" class="" alt="User Image">
                            <p>
                                @if (!Auth::guest())
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                @endif
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <p class="uk-text-small uk-text-center">ボーイスカウト東京連盟<br>
                {{ config('app.name') }} &copy;</p>
        </footer>
    </div>

    <script src="{{ asset('js/popper.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>

    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>

    {{-- 地区名と団名をシンクロさせる --}}
    <script type="text/javascript">
        $(function() {
            var $children = $('.children'); //都道府県の要素を変数に入れます。
            var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく

            //地方側のselect要素が変更になるとイベントが発生
            $('.parent').change(function() {

                //選択された地方のvalueを取得し変数に入れる
                var val1 = $(this).val();

                //削除された要素をもとに戻すため.html(original)を入れておく
                $children.html(original).find('option').each(function() {
                    var val2 = $(this).data('val'); //data-valの値を取得

                    //valueと異なるdata-valを持つ要素を削除
                    if (val1 != val2) {
                        $(this).not(':first-child').remove();
                    }

                });

                //地方側のselect要素が未選択の場合、都道府県をdisabledにする
                if ($(this).val() == "") {
                    $children.attr('disabled', 'disabled');
                } else {
                    $children.removeAttr('disabled');
                }
            });
        });
    </script>
    {{-- 地区名と団名をシンクロさせる --}}

    @yield('third_party_scripts')

    @stack('page_scripts')
</body>

</html>
