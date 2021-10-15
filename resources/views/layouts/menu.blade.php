<p class="uk-hidden">{{ $configs=\App\Models\AdminConfig::first(); }}</p>
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
        @endif
        @if ($configs->healthcheck)
            <a href="{{ url('/user/planUploads') }}" class="btn btn-info btn-xs btn-block">計画書アップロード</a>
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
            <p>管理者用一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('adminresultUploads.index') }}"
            class="nav-link {{ Request::is('entryForms*') ? 'active' : '' }}">
            <p>結果画像一覧</p>
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
{{-- <li class="nav-item">
    <a href="{{ route('entryForms.index') }}"
       class="nav-link {{ Request::is('user/entryForms*') ? 'active' : '' }}">
        <p>Entry Forms</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('elearnings.index') }}"
       class="nav-link {{ Request::is('elearnings*') ? 'active' : '' }}">
        <p>Elearnings</p>
    </a>
</li> --}}
{{-- <li class="nav-item">
    <a href="{{ route('resultUploads.index') }}"
       class="nav-link {{ Request::is('resultUploads*') ? 'active' : '' }}">
        <p>Result Uploads</p>
    </a>
</li> --}}
@if ($configs->show_status_link)
<li class="nav-item">
    <a href="{{ route('status.index') }}" class="nav-link {{ Request::is('status*') ? 'active' : '' }}">
        <p>スターテス一覧</p>
    </a>
</li>
@endif
<li class="nav-item">
    <a href="{{ route('temps.index') }}"
       class="nav-link {{ Request::is('temps*') ? 'active' : '' }}">
        <p>体温計測</p>
    </a>
</li>


