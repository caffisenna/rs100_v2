@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Eラーニング</h1>
                </div>
                <div class="col-sm-6">
                    @unless($elearning->id)
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
                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q4:CPの正しい使い方を選んでください</h3>
                        <p class="">コロナウイルス感染対策のため速やかにCPから移動してください。ただし、10分間の休憩は可能です。</p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q5:歩行時の行動について１つ選んでください。</h3>
                        <p class="">歩きスマホは禁止です。またバッテリーの消耗に注意してください。充電が切れないようにモバイルバッテリーを必ず持っておきましょう。
                        </p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q6:ゴミの処分について正しいものを選んでください。</h3>
                        <p class="">会場は借りているものです。またコースは大会のために各地域で許可を得て使っているものです。キレイに使いましょう。
                        </p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q7:スタート前の会場の使い方について、正しいものを選んでください。</h3>
                        <p class="">会場は混み合います。増上寺は特にスペースに限りがあるため、思いやりの心を持って対応してください。
                        </p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q8:100キロハイク中に疲れた時の行動について正しいものを選んでください。</h3>
                        <p class="">スカウト活動中の飲酒は厳禁です。
                        </p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q9:周りの人に迷惑になるようなマナー違反が発覚した場合、運営委員会から出される処置として正しいものを選んでください。 </h3>
                        <p class="">今年も厳しく取り締まりますが、皆さんがしっかり協力してくれれば問題ないと信じています。よろしくお願いします。
                        </p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q11:会場での更衣について、正しいものを選んでください。</h3>
                        <p class="">原則、制服で会場まできてください。また、更衣は指定の場所で行ってください。
                        </p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q12:制服を持っていない場合の対応について正しいものを選んでください</h3>
                        <p class="">セレモニーは制服必須です。正規の制服着用でない限り、当日のスタートを認めません。
                        </p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q13:当日までの体調管理について正しいものを選んでください。</h3>
                        <p class="">万全の体制で臨んでください。
                        </p>
                    </div>
                </div>

                <div>
                    <div class="uk-card-primary uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Q15:100キロハイク中のSNSへの投稿について正しいものを選んでください。</h3>
                        <p class="">ぜひさまざまなSNSに投稿して大会を盛り上げていきましょう！
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
