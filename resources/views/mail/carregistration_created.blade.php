<p>{{ $name }} 様</p>
<p>東京連盟RS100kmハイク受付システムから自動送信しています。</p>


<h3>駐車許可証</h3>
以下のリンクよりダウンロードが可能です。<br>
<a href="{{ url('/car_registration_pdf?uuid=') }}{{ $uuid }}">駐車許可証をダウンロード</a>

<p>当日は許可証を印刷し、ダッシュボードに置いて外から見えるようにしてください。</p>

<p>恐れ入りますがもしこの登録にお心当たりが無い場合は、<a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>までご連絡ください。</p>

----<br>
東京連盟RS100kmハイク<br>
{{ config('app.name') }}<br>
<a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
