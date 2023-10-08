<p>{{ $input['driver_name'] }} 様</p>
<p>東京連盟RS100kmハイク受付システムから自動送信しています。</p>


{{-- <h3>駐車許可証</h3>
以下のリンクよりダウンロードが可能です。<br>
<a href="{{ url('/car_registration_pdf?uuid=') }}{{ $uuid }}">駐車許可証をダウンロード</a>

<p>当日は許可証を印刷し、ダッシュボードに置いて外から見えるようにしてください。</p> --}}

<p class="uk-text-default">
    駐車許可証の申請を受け付けました。<br>
    許可証の準備ができましたらメールにてお知らせ致します。<br>
    今しばらくお待ちください。
</p>

<h3>申請内容</h3>
運転者氏名: {{ $input['driver_name'] }}<br>
ケータイ: {{ $input['cell_phone'] }}<br>
地区: {{ $input['district'] }}<br>
団名: {{ $input['dan_name'] }}<br>
役務: {{ $input['position'] }}<br>
参加者との関係: {{ $input['relation'] }}<br>
車両ナンバー: {{ $input['car_number'] }}

<p>恐れ入りますがもしこの登録にお心当たりが無い場合は、<a
        href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>までご連絡ください。</p>

----<br>
東京連盟RS100kmハイク<br>
{{ config('app.name') }}<br>
<a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
