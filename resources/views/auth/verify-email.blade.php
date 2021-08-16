<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RS100kmハイク メール認証</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q=="
          crossorigin="anonymous"/>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
          integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
          crossorigin="anonymous"/>

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
          integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
          crossorigin="anonymous"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="">
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
<footer class="footer text-muted text-center small">
    <strong>Copyright &copy; 2017- <a href="{{ url('/') }}">東京連盟RS100kmハイク登録システム</a>.</strong> All rights
    reserved.
</footer>
</body>
</html>
