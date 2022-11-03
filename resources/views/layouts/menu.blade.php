<p class="uk-hidden">{{ $configs = \App\Models\AdminConfig::first() }}</p>
@if (isset(Auth::user()->email_verified_at))
    @unless(Auth::user()->is_admin || Auth::user()->is_commi || Auth::user()->is_staff)
        {{-- @if ($configs->create_application) --}}
        <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-xs btn-block">申込情報</a>
        {{-- @endif --}}
        @if ($configs->elearning)
            <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-xs btn-block">Eラーニング</a>
        @endif
    @endunless
@endif
{{-- 管理者アカウントでのみ表示 --}}
@if (Auth::user()->is_admin)
<p class="uk-text-warning">参加者管理</p>
    <li class="nav-item">
        <a href="{{ route('adminentries.index') }}"
            class="nav-link {{ Request::is('admin/adminentries*') ? 'active' : '' }}">
            <p>参加者一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('admin/non_tokyo') }}"
            class="nav-link {{ Request::is('admin/non_tokyo*') ? 'active' : '' }}">
            <p>他県参加一覧</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/admin/deleted') }}" class="nav-link {{ Request::is('admin/deleted*') ? 'active' : '' }}">
            <p>申込削除一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('buddylists.index') }}"
            class="nav-link {{ Request::is('admin/buddylists*') ? 'active' : '' }}">
            <p>バディリスト</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/buddy_ok') }}"
            class="nav-link {{ Request::is('admin/buddy_ok*') ? 'active' : '' }}">
            <p>バディOK男性</p>
        </a>
    </li>
    <p class="uk-text-warning">事務局機能</p>
    <li class="nav-item">
        <a href="{{ url('/admin/fee_check') }}"
            class="nav-link {{ Request::is('admin/fee_check*') ? 'active' : '' }}">
            <p>参加費チェック</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/registration_check') }}"
            class="nav-link {{ Request::is('admin/registration_check*') ? 'active' : '' }}">
            <p>加盟登録チェック</p>
        </a>
    </li>
    <p class="uk-text-warning">Setting</p>
    <li class="nav-item">
        <a href="{{ route('adminConfigs.index') }}"
            class="nav-link {{ Request::is('admin/adminConfigs*') ? 'active' : '' }}">
            <p>管理設定</p>
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

{{-- 公式サイトリンク --}}
<a href="https://blog.rs100.info" class="btn btn-info btn-xs btn-block">公式サイト</a>
{{-- 公式サイトリンク --}}

{{-- ログアウトボタン --}}
<a href="#" class="btn btn-danger btn-xs btn-block"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    ログアウト
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
{{-- ログアウトボタン --}}
