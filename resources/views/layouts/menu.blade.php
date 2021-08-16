@if (isset(Auth::user()->email_verified_at))
    <ul>
        <li><a href="#">申込書</a></li>
        <li><a href="#">Eラーニング</a></li>
        <li><a href="#">健康調査書</a></li>
        <li><a href="#">設定</a></li>
    </ul>
@endif
<li class="nav-item">
    <a href="{{ route('adminConfigs.index') }}"
       class="nav-link {{ Request::is('adminConfigs*') ? 'active' : '' }}">
        <p>Admin Configs</p>
    </a>
</li>


