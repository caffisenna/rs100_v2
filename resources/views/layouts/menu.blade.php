<p class="uk-hidden">{{ $configs = \App\Models\AdminConfig::first() }}</p>
@if (isset(Auth::user()->email_verified_at))
    @unless(Auth::user()->is_admin || Auth::user()->is_commi || Auth::user()->is_staff)
        {{-- @if ($configs->create_application) --}}
        <a href="{{ url('/user/entryForms') }}" class="btn btn-info btn-xs btn-block">申込書</a>
        {{-- @endif --}}
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
        @if ($configs->temp_ok == 'true')
            <a href="{{ url('/user/temps') }}" class="btn btn-info btn-xs btn-block">体温計測</a>
        @endif
        @if ($configs->show_status_link)
            <a href="/public" class="btn btn-info btn-xs btn-block">ステータス一覧(一般公開用)</a>
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
    {{-- <li class="nav-item">
        <a href="{{ route('adminplanUploads.index') }}"
            class="nav-link {{ Request::is('admin/adminplanUploads*') ? 'active' : '' }}">
            <p>計画書一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('adminresultUploads.index') }}"
            class="nav-link {{ Request::is('admin/adminresultUploads*') ? 'active' : '' }}">
            <p>結果画像チェック</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/admin/result_lists"
            class="nav-link {{ Request::is('admin/result_list*') ? 'active' : '' }}">
            <p>結果画像一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('templists') }}?q=day1"
            class="nav-link {{ Request::is('admin/temp_lists*1') ? 'active' : '' }}">
            <p>体温計測一覧(11/13)</p>
        </a>
    </li>
    <li>
        <a href="{{ route('templists') }}?q=day2"
            class="nav-link {{ Request::is('admin/temp_lists*2') ? 'active' : '' }}">
            <p>体温計測一覧(11/14)</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('reach50100.index') }}"
            class="nav-link {{ Request::is('admin/reach50100*') ? 'active' : '' }}">
            <p>ランキングボード</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/public" class="nav-link"><p>歩行状況(一般公開用)</p></a>
    </li>
    <li class="nav-item">
        <a href="/status" class="nav-link"><p>歩行状況(詳細)</p></a>
    </li> --}}
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

@if (Auth::user()->is_staff)
    <li class="nav-item">
        <a href="{{ url('/staff/staffplanUploads') }}"
            class="nav-link {{ Request::is('staff/staffplanUploads*') ? 'active' : '' }}">
            <p>スタッフ用計画書一覧</p>
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
