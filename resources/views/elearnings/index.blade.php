@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Eラーニング</h1>
                </div>
                <div class="col-sm-6">
                    @unless ($elearning->id)
                        <a class="btn btn-primary float-right" href="{{ route('elearnings.create') }}">
                            受講する
                        @endunless
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('elearnings.table')
            </div>

        </div>
        @if (isset($elearning->created_at))
            <h2>Eラーニングの解説</h2>
            <div class="exp">
                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q1:大会中リタイアをする場合、正しい行動を選んでください。</h3>
                        <p class="">原則としてCP以外でリタイアはすることができません。歩けなくなった等の緊急時には本部まで連絡してください。</p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q6:CPの正しい使い方を選んでください</h3>
                        <p class="">過去にCP周辺の住民の方から騒音のクレームを頂いたことがあるので、特に夜間のCPでは秩序ある利用をお願いします。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q7:歩行時の行動について１つ選んでください。</h3>
                        <p class="">歩きスマホは禁止です。またバッテリーの消耗に注意してください。充電が切れないようにモバイルバッテリーを必ず持っておきましょう。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q8:ゴミの処分について正しいものを選んでください。</h3>
                        <p class="">会場は借りているものです。またコースは大会のために各地域で許可を得て使っているものです。キレイに使いましょう。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q9:スタート前の会場の使い方について、正しいものを選んでください。</h3>
                        <p class="">会場は混み合いますので思いやりの心を持って対応してください。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q10:100キロハイク中に疲れた時の行動について正しいものを選んでください。</h3>
                        <p class="">スカウト活動中の飲酒は厳禁です。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q11:周りの人に迷惑になるようなマナー違反が発覚した場合、運営委員会から出される処置として正しいものを選んでください。</h3>
                        <p class="">今年も厳しく取り締まりますが、皆さんがしっかり協力してくれれば問題ないと信じています。よろしくお願いします。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q13:会場での更衣について、正しいものを選んでください。</h3>
                        <p class="">原則、制服制帽で会場まできてください。また、更衣は指定の場所で行ってください。開会式に出席するためには制服を着用している必要があります。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q14:制服を持っていない場合の対応について正しいものを選んでください</h3>
                        <p class="">セレモニーは制服制帽が必須です。正規の制服着用でない限り、当日のスタートを認めません。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q15:当日までの体調管理について正しいものを選んでください。</h3>
                        <p class="">万全の体制で望んでください。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q16:当日の配布物について正しいものを選んでください。</h3>
                        <p class="">参加受付後に配布しますので、受け取り次第数量やIDに誤りがないかを確認するようにしてください。
                            <br>※例年ゼッケンやIDカード（ネームホルダー）を着用していない参加者の方が散見されますので、必ず見えるように着用するようにしてください。ゼッケンやIDカードを着用していない場合はCPを通過できないため着用にご協力よろしくお願いします。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q17:100キロハイク中のSNSへの投稿について正しいものを選んでください。</h3>
                        <p class="">ぜひさまざまなSNSに投稿して大会を盛り上げていきましょう!
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q18:スタート地点へのアクセス方法について正しいものを選んでください。</h3>
                        <p class="">
                            増上寺への来場の際は、車でのご利用はご遠慮ください。万が一、参加者や関係者が増上寺の駐車場を利用していることが判明した場合、その参加者および同一団体に所属するすべての参加者の出場資格を即時剥奪し、次年度以降の参加を認めません。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q19:加盟登録証の提示について正しいものを選んでください。</h3>
                        <p class="">
                            スマホから<a
                                href="https://mypage.scout.or.jp/">マイページ(https://mypage.scout.or.jp/)</a>にログインしデジタル登録証のスクショをしてスムーズに表示できるようにしておいてください。
                            ※ログイン情報は各団に送付されているので、団に問い合わせてIDとパスワードを入手してください。
                            ※大会HPにアップロードされる「チェックインガイド」を参考にデジタル加盟登録証を取得するようにしてください。
                            ※デジタル登録証で対応できない場合は、別の方法で受け付けも可能です。
                        </p>
                    </div>
                </div>

                <div class="uk-margin-bottom">
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q20:本部との連絡手段に関して正しいものを選んでください。</h3>
                        <p class="">
                            大会までに必ず大会公式LINEを追加して送られてくるメッセージに従って情報を入力するようにしてください。緊急性の高い場合はIDカードに記載されている本部電話番号までご連絡ください。
                            URL:<a href="https://lin.ee/PO2DquT">https://lin.ee/PO2DquT</a>
                        </p>
                        <p class="">
                            <img src="{{ asset('/images/line_57th.png') }}" alt="" width="" height="">
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
