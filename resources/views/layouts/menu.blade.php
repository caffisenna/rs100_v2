<p class="uk-hidden">{{ $configs = \App\Models\AdminConfig::first() }}</p>
@if (isset(Auth::user()->email_verified_at))
    @unless(Auth::user()->is_admin || Auth::user()->is_commi)
        @if ($configs->create_application)
            <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-xs btn-block">申込書</a>
        @endif
        @if ($configs->elearning)
            <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-xs btn-block">Eラーニング</a>
        @endif
        @if ($configs->user_upload)
            <a href="{{ url('/user/resultUploads') }}" class="btn btn-info btn-xs btn-block">結果アップロード</a>
            <a href="{{ url('/user/resultInputs') }}" class="btn btn-info btn-xs btn-block">結果手入力</a>
        @endif
        @if ($configs->healthcheck)
            <a href="{{ url('/user/planUploads') }}" class="btn btn-info btn-xs btn-block">計画書アップロード</a>
        @endif
        @if ($configs->temps_link)
            <a href="{{ url('/user/temps') }}" class="btn btn-info btn-xs btn-block">体温計測</a>
        @endif
    @endunless
@endif
{{-- 管理者アカウントでのみ表示 --}}
@if (Auth::user()->is_admin)
    <li class="nav-item">
        <a href="{{ route('adminConfigs.index') }}"
            class="nav-link {{ Request::is('adminConfigs*') ? 'active' : '' }}">
            <p>管理コンパネ</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('adminentries.index') }}"
            class="nav-link {{ Request::is('entryForms*') ? 'active' : '' }}">
            <p>参加者一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('adminresultUploads.index') }}"
            class="nav-link {{ Request::is('entryForms*') ? 'active' : '' }}">
            <p>結果画像一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('templists') }}"
            class="nav-link {{ Request::is('temps*') ? 'active' : '' }}">
            <p>体温計測一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('reach50100.index') }}"
           class="nav-link {{ Request::is('reach50100*') ? 'active' : '' }}">
            <p>50km&100km到達</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/deleted') }}"
           class="nav-link {{ Request::is('deleted*') ? 'active' : '' }}">
            <p>申込削除</p>
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
        <a href="{{ route('entries.index') }}" class="nav-link {{ Request::is('entries*') ? 'active' : '' }}">
            <p>地区参加者一覧</p>
        </a>
    </li>
@endif

@if ($configs->show_status_link)
    <li class="nav-item">
        <a href="{{ route('status.index') }}" class="nav-link {{ Request::is('status*') ? 'active' : '' }}">
            <p>ステータス一覧</p>
        </a>
    </li>
@endif

{{-- ログアウトボタン --}}
<a href="#" class="btn btn-danger btn-xs btn-block"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    ログアウト
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
{{-- ログアウトボタン --}}
