@if (session('message'))
    <div class="text-success">
        {{ session('message') }}
    </div>
@endif
<span style="color:white">
    {{ Auth::user()->name }}<br>
    {{ Auth::user()->email }}
</span>
@if (isset(Auth::user()->email_verified_at))
    <ul>
        <li><a href="#">申込書</a></li>
        <li><a href="#">Eラーニング</a></li>
        <li><a href="#">健康調査書</a></li>
        <li><a href="#">設定</a></li>
    </ul>
@else
    <p class="text-danger">メール認証が完了していません</p>
    <form action="{{ url('/') }}/email/verification-notification" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">認証リンクを再送する</button>
    </form>
@endif
