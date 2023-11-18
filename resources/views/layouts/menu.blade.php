<p class="uk-hidden">{{ $configs = \App\Models\AdminConfig::first() }}</p>
@if (!Auth::guest() && Auth::user()->email_verified_at)
    @unless (Auth::user()->is_admin || Auth::user()->is_commi || Auth::user()->is_staff)
        {{-- @if ($configs->create_application) --}}
        <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-xs btn-block">申込情報</a>
        {{-- @endif --}}
        @if ($configs->elearning)
            <a href="{{ url('/user/elearnings') }}" class="btn btn-info btn-xs btn-block">Eラーニング</a>
        @endif
    @endunless
@endif
{{-- 管理者アカウントでのみ表示 --}}
@if (!Auth::guest() && Auth::user()->is_admin)
    <p class="uk-text-warning">参加者管理</p>
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
            <p>参加者内訳</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('adminentries.index') }}"
            class="nav-link {{ Request::is('admin/adminentries*') ? 'active' : '' }}">
            <p>参加者一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/overage') }}" class="nav-link {{ Request::is('admin/overage*') ? 'active' : '' }}">
            <p>オーバーエイジ</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('admin/non_tokyo') }}" class="nav-link {{ Request::is('admin/non_tokyo*') ? 'active' : '' }}">
            <p>他県参加一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/deleted') }}" class="nav-link {{ Request::is('admin/deleted*') ? 'active' : '' }}">
            <p>申込削除一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/with_memo') }}"
            class="nav-link {{ Request::is('admin/with_memo*') ? 'active' : '' }}">
            <p>備考入力あり</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/non_registered') }}"
            class="nav-link {{ Request::is('admin/non_registered*') ? 'active' : '' }}">
            <p>未申込者</p>
        </a>
    </li>

    <p class="uk-text-warning">確認ステータス</p>
    <li class="nav-item">
        <a href="{{ url('/admin/check_status?cat=commi') }}"
            class="nav-link {{ Request::is('admin/check_status?cat=commi') ? 'active' : '' }}">
            <p>地区コミ未確認</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/admin/check_status?cat=dan') }}"
            class="nav-link {{ Request::is('admin/check_status?cat=dan') ? 'active' : '' }}">
            <p>団未承認</p>
        </a>
    </li>

    <p class="uk-text-warning">チェックイン業務</p>

    <li class="nav-item">
        <a href="{{ url('/admin/checkin') }}" class="nav-link {{ Request::is('admin/checkin') ? 'active' : '' }}">
            <p><span uk-icon="check"></span>チェックイン</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/admin/checkin/done') }}"
            class="nav-link {{ Request::is('admin/checkin/done*') ? 'active' : '' }}">
            <p><span uk-icon="users"></span>チェックイン済み一覧</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/admin/checkin/not_yet') }}"
            class="nav-link {{ Request::is('admin/checkin/not_yet*') ? 'active' : '' }}">
            <p><span uk-icon="bolt"></span>未チェックイン</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/admin/line_check') }}"
            class="nav-link {{ Request::is('admin/line_check*') ? 'active' : '' }}">
            <p><span uk-icon="bolt"></span>LINE確認</p>
        </a>
    </li>

    <p class="uk-text-warning">バディ関係</p>
    <li class="nav-item">
        <a href="{{ route('buddylists.index') }}"
            class="nav-link {{ Request::is('admin/buddylists*') ? 'active' : '' }}">
            <p>バディリスト</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/buddy_match') }}"
            class="nav-link {{ Request::is('admin/buddy_match*') ? 'active' : '' }}">
            <p>バディ斡旋希望</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/buddy_ok') }}" class="nav-link {{ Request::is('admin/buddy_ok*') ? 'active' : '' }}">
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

    @if ($configs->car_registration)
        <p class="uk-text-warning">駐車許可証</p>
        <li class="nav-item">
            <a href="{{ route('car_registrations.index') }}"
                class="nav-link {{ Request::is('carRegistrations*') ? 'active' : '' }}">
                <span uk-icon="file-text"></span>
                <p>駐車許可証申請</p>
            </a>
        </li>
    @endif

    <p class="uk-text-warning">Setting</p>
    <li class="nav-item">
        <a href="{{ route('adminConfigs.index') }}"
            class="nav-link {{ Request::is('admin/adminConfigs*') ? 'active' : '' }}">
            <p>管理設定</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('add_users.index') }}"
            class="nav-link {{ Request::is('admin/add_users*') ? 'active' : '' }}">
            <p><span uk-icon="icon: user"></span>アカウント管理</p>
        </a>
    </li>
@endif

@if (!Auth::guest() && Auth::user()->is_commi)
    <li class="nav-item">
        <a href="{{ route('entries.index') }}" class="nav-link {{ Request::is('commi/entries*') ? 'active' : '' }}">
            <span uk-icon="icon: users"></span>
            <p>地区参加者一覧</p>
        </a>
    </li>
@endif

<p class="uk-text-warning">Links</p>
{{-- 公式サイトリンク --}}
<a href="https://rs100.scout.tokyo" class="btn btn-info btn-xs btn-block">公式サイト</a>
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
