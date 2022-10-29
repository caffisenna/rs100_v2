<!-- Q1 Field -->
<div class="form-group col-sm-12 @if ($errors->has('q1')) has-error @endif">
    {{-- {!! Form::label('q1', 'Q1:大会中リタイアをしたくなり、リタイアをする場合、正しい行動を選んでください。', ['class' => 'form-check-label']) !!} --}}
    <h3>Q1:大会中リタイアをする場合、正しい行動を選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q1', '1', null, ['class' => 'form-check-input']) !!} CPにてリタイア用のQRコードを読み取り、リタイアする。
    </label>
    <label class="form-check">
        {!! Form::radio('q1', '2', null, ['class' => 'form-check-input']) !!} 連絡せずにそのまま帰る。
    </label>
    @error('q1')
        <div class="error text-danger">{{ $message }}</div>
    @enderror

</div>


<!-- Q1 Field -->
<div class="form-group col-sm-12 @if ($errors->has('q2')) has-error @endif">
    <h3>Q2:歩行中喫煙したくなった場合、正しい行動を選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q2', '1', null, ['class' => 'form-check-input']) !!} 公共の喫煙所に行き、そこで喫煙する。
    </label>
    <label class="form-check">
        {!! Form::radio('q2', '2', null, ['class' => 'form-check-input']) !!} 歩きながら吸う。
    </label>
    @error('q2')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Q1 Field -->
<div class="form-group col-sm-12 @if ($errors->has('q3')) has-error @endif">
    <h3>Q3:昼夜問わず、住宅街を歩くときの行動について選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q3', '1', null, ['class' => 'form-check-input']) !!} スピーカーで音楽をかけたり、騒ぎながら歩いてよい
    </label>

    <label class="form-check">
        {!! Form::radio('q3', '2', null, ['class' => 'form-check-input']) !!} 話し声が過度に大きくならないよう、大会中は気をつけながら歩く
    </label>
    @error('q3')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q5')) has-error @endif">
    <h3>Q4:CPの正しい使い方を選んでください</h3>
    <label class="form-check">
        {!! Form::radio('q4', '1', null, ['class' => 'form-check-input']) !!} まずは車で応援に駆けつけてくれた方々に元気よくお礼を言い、束の間の休憩を楽しむ。
    </label>

    <label class="form-check">
        {!! Form::radio('q4', '2', null, ['class' => 'form-check-input']) !!} お腹が空いたので差し入れを貰い、体力が回復してから通過手続きをし、出発する。
    </label>

    <label class="form-check">
        {!! Form::radio('q4', '3', null, ['class' => 'form-check-input']) !!} 通過手続きをし、CPに長時間滞在せず速やかに次のCPへ向かう。
    </label>
    @error('q4')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q5')) has-error @endif">
    <h3>Q5:歩行時の行動について１つ選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q5', '1', null, ['class' => 'form-check-input']) !!} 100キロハイク中とはいえゲームも大事なので、歩きながらゲームプレイをする。
    </label>

    <label class="form-check">
        {!! Form::radio('q5', '2', null, ['class' => 'form-check-input']) !!} 歩きながらスマートフォンを操作するのは事故やトラブルの元になるので、歩行中は操作せず、立ち止まって操作する。

    </label>

    <label class="form-check">
        {!! Form::radio('q5', '3', null, ['class' => 'form-check-input']) !!} 方向音痴な性格なので、たとえ歩行中でもスマートフォンのマップアプリは欠かせない。
    </label>
    @error('q5')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q6')) has-error @endif">
    <h3>Q6:ゴミの処分について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q6', '1', null, ['class' => 'form-check-input']) !!} 自分で出したゴミは自分で持って帰る
    </label>

    <label class="form-check">
        {!! Form::radio('q6', '2', null, ['class' => 'form-check-input']) !!} 目立たない場所に置いて帰る。
    </label>

    <label class="form-check">
        {!! Form::radio('q6', '3', null, ['class' => 'form-check-input']) !!} 本部の奴らに押し付ける。
    </label>
    @error('q6')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q7')) has-error @endif">
    <h3>Q7:スタート前の会場の使い方について、正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q7', '1', null, ['class' => 'form-check-input']) !!} 荷物を広げ、自分たちの団体の場所を確保する。
    </label>

    <label class="form-check">
        {!! Form::radio('q7', '2', null, ['class' => 'form-check-input']) !!} 極力荷物は広げず、場所を詰めて待機する。
    </label>
    @error('q7')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q8')) has-error @endif">
    <h3>Q8:100キロハイク中に疲れた時の行動について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q8', '1', null, ['class' => 'form-check-input']) !!} 疲れを感じているのをごまかすために、アルコール飲料を飲む。
    </label>

    <label class="form-check">
        {!! Form::radio('q8', '2', null, ['class' => 'form-check-input']) !!} 他の人の邪魔にならない場所で休憩し、水分・栄養補給やマッサージをする。
    </label>

    <label class="form-check">
        {!! Form::radio('q8', '3', null, ['class' => 'form-check-input']) !!} コンビニなどの前に大勢で座り込み、たっぷり休憩を取る。
    </label>
    @error('q8')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q9')) has-error @endif">
    <h3>Q9:周りの人に迷惑になるようなマナー違反が発覚した場合、運営委員会から出される処置として正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q9', '1', null, ['class' => 'form-check-input']) !!} その場で注意される。
    </label>

    <label class="form-check">
        {!! Form::radio('q9', '2', null, ['class' => 'form-check-input']) !!} 厳重注意の上、その場で改善が見られない場合、強制リタイア、記録無効とする。
    </label>

    <label class="form-check">
        {!! Form::radio('q9', '3', null, ['class' => 'form-check-input']) !!} 楽しいイベントに水を差すことはしたくないので目をつむる。
    </label>
    @error('q9')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q10')) has-error @endif">
    <h3>Q10:歩く際の交通ルールついて選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q10', '1', null, ['class' => 'form-check-input']) !!} １分１秒でも早いタイムでゴールしたいので、車が通っていなければ赤信号や横断歩道を無視した最短コースで歩く。

    </label>

    <label class="form-check">
        {!! Form::radio('q10', '2', null, ['class' => 'form-check-input']) !!} 100キロハイクは競技ではなく訓練なので、急いでいても基本的な交通法規を守り、安全にゴールできるように歩く。
        @error('q10')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q11')) has-error @endif">
    <h3>Q11:会場での更衣について、正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q11', '1', null, ['class' => 'form-check-input']) !!} 受付の前で素早く着替える
    </label>
    <label class="form-check">
        {!! Form::radio('q11', '2', null, ['class' => 'form-check-input']) !!} セレモニー直前に木陰に隠れてこっそり制服に着替える。
    </label>
    <label class="form-check">
        {!! Form::radio('q11', '3', null, ['class' => 'form-check-input']) !!} 制服で会場に来て、開会式が終わったら指定の場所で動きやすい格好に着替える
    </label>
    @error('q11')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q12')) has-error @endif">
    <h3>Q12:制服を持っていない場合の対応について正しいものを選んでください</h3>
    <label class="form-check">
        {!! Form::radio('q12', '1', null, ['class' => 'form-check-input']) !!} とりあえずそれっぽいものを着てくる。
    </label>

    <label class="form-check">
        {!! Form::radio('q12', '2', null, ['class' => 'form-check-input']) !!} 事前に買う。
    </label>

    <label class="form-check">
        {!! Form::radio('q12', '3', null, ['class' => 'form-check-input']) !!} 友達や先輩から借りて、着回しする。
    </label>
    @error('q12')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q13')) has-error @endif">
    <h3>Q13:当日までの体調管理について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q13', '1', null, ['class' => 'form-check-input']) !!} 2週間前から検温を行い、健康に気を付ける。
    </label>

    <label class="form-check">
        {!! Form::radio('q13', '2', null, ['class' => 'form-check-input']) !!} 普段から健康なのでいつも通り生活する。
    </label>

    <label class="form-check">
        {!! Form::radio('q13', '3', null, ['class' => 'form-check-input']) !!} 前日に徹夜で飲み会に行き、士気を高める。
    </label>
    @error('q13')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q14')) has-error @endif">
    <h3>Q14:当日の配布物について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q14', '1', null, ['class' => 'form-check-input']) !!} ゼッケン、蛍光シール、安全ピンが渡されるが、着用は個人の自由である。
    </label>

    <label class="form-check">
        {!! Form::radio('q14', '2', null, ['class' => 'form-check-input']) !!} エナジードリンクが渡され、体力回復に使える。
    </label>

    <label class="form-check">
        {!! Form::radio('q14', '3', null, ['class' => 'form-check-input']) !!} ゼッケン、蛍光シール、安全ピンが渡され、前後から見えるように必ず着用する。
    </label>
    @error('q14')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q15')) has-error @endif">
    <h3>Q15:100キロハイク中のSNSへの投稿について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q15', '1', null, ['class' => 'form-check-input']) !!} TwitterやInstagram、Facebookなどに＃RS100kmをつけて投稿する。
    </label>

    <label class="form-check">
        {!! Form::radio('q15', '2', null, ['class' => 'form-check-input']) !!} 大会中は歩くことに専念しなければいけないため、SNSへの投稿は禁止されている。
    </label>

    @error('q15')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>
