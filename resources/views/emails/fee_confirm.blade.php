<p>{{ $entryform->prefecture }}連盟 {{ $entryform->district }}地区 {{ $entryform->dan_name }}団<br>
{{ $entryform->user->name }}さん</p>

<p>第56回ローバー100kmハイクへのエントリーに関しまして、参加費入金の確認が行われたことをお知らせします。</p>

<p>承認日: {{ $entryform->fee_checked_at }}</p>

<pre>
==================================================
{{ config('mail.from.name') }}
{{ config('app.url') }}
{{ config('mail.from.address') }}
==================================================
</pre>
