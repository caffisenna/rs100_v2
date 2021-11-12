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

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
        integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
        crossorigin="anonymous" />


    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>

    {{-- datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>


    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="content">
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a href="{{ url('/') }}"><img src="{{ url('/images/logo_color.png') }}"
                                    class="img-circle elevation-2 uk-image"></a>
                            <h1>歩行状況詳細</h1> <a href="{{ url('/public') }}">簡易版</a>
                        </div>
                    </div>
                </div>
            </section>

            <div class="content px-3">

                @include('flash::message')

                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-body p-0">
                        @include('status.table')
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- Main Footer -->
    <footer class="footer">
        <p class="uk-text-small uk-text-center">ボーイスカウト東京連盟<br>
            <a href="{{ url('/') }}">{{ config('app.name') }} </a>&copy;
        </p>
    </footer>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#status-table').DataTable();
    });
</script>

</html>
