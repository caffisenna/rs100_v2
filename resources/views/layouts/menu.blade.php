@if (isset(Auth::user()->email_verified_at))
    <ul>
        <li><a href="#">申込書</a></li>
        <li><a href="#">Eラーニング</a></li>
        <li><a href="#">健康調査書</a></li>
        <li><a href="#">設定</a></li>
    </ul>
@endif

{{-- 管理者アカウントでのみ表示 --}}
@if (Auth::user()->is_admin)
    <li class="nav-item">
        <a href="{{ route('adminConfigs.index') }}"
            class="nav-link {{ Request::is('adminConfigs*') ? 'active' : '' }}">
            <p>管理コンパネ</p>
        </a>
    </li>
@endif

@if (Auth::user()->is_staff)
    <li class="nav-item">
        <a href="{{ route('adminConfigs.index') }}"
            class="nav-link {{ Request::is('adminConfigs*') ? 'active' : '' }}">
            <p>スタッフ用メニュー</p>
        </a>
    </li>
@endif

@if (Auth::user()->is_commi)
    <li class="nav-item">
        <a href="{{ route('adminConfigs.index') }}"
            class="nav-link {{ Request::is('adminConfigs*') ? 'active' : '' }}">
            <p>地区コミ用メニュー</p>
        </a>
    </li>
@endif
<li class="nav-item">
    <a href="{{ route('entryForms.index') }}"
       class="nav-link {{ Request::is('user/entryForms*') ? 'active' : '' }}">
        <p>Entry Forms</p>
    </a>
</li>


