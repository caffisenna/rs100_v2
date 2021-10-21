<!-- Q1 Field -->
<div class="form-group col-sm-12 @if ($errors->has('q1')) has-error @endif">
    {{-- {!! Form::label('q1', 'Q1:大会中リタイアをしたくなり、リタイアをする場合、正しい行動を選んでください。', ['class' => 'form-check-label']) !!} --}}
    <h3>Q1:大会中リタイアをしたくなり、リタイアをする場合、正しい行動を選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q1', '1', null, ['class' => 'form-check-input']) !!} 歩行計測アプリ(TATTA)での計測を終了させ、エントリーシステムにて歩行終了の連絡をする。
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
    {{-- {!! Form::label('q2', 'Q2:歩行中喫煙したくなった場合、正しい行動を選んでください。', ['class' => 'form-check-label']) !!} --}}
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
    {{-- {!! Form::label('q3', 'Q3:自隊のサポーターが駆けつけようとしています。その際の過ごし方として正しいものを選んでください。', ['class' => 'form-check-label']) !!} --}}
    <h3>Q3:自隊のサポーターが駆けつけようとしています。その際の過ごし方として正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q3', '1', null, ['class' => 'form-check-input']) !!} サポートをお願いする。すぐにまた移動するので車は空いている路上に停めてもらう。不要な荷物は預けることで、ハイキングに万全の装備を整える。
    </label>

    <label class="form-check">
        {!! Form::radio('q3', '2', null, ['class' => 'form-check-input']) !!} サポートをお願いする。気持ちを鼓舞するため、サポーターとの話に盛り上がる。
    </label>

    <label class="form-check">
        {!! Form::radio('q3', '3', null, ['class' => 'form-check-input']) !!} コロナ禍での活動のため、他人との接触を控える意味でも予めサポートを断る。
    </label>
    @error('q3')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q5')) has-error @endif">
    {{-- {!! Form::label('q4', 'Q4:歩行時の正しい行動について１つ選んでください。', ['class' => 'form-check-label']) !!} --}}
    <h3>Q4:歩行時の正しい行動について１つ選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q4', '1', null, ['class' => 'form-check-input']) !!} 100キロハイク中とはいえゲームも大事なので、歩きながらゲームプレイをする。
    </label>

    <label class="form-check">
        {!! Form::radio('q4', '2', null, ['class' => 'form-check-input']) !!} 歩きながらスマートフォンを操作するのは事故やトラブルの元になるので、歩行中は操作せず、立ち止まって操作する。
    </label>

    <label class="form-check">
        {!! Form::radio('q4', '3', null, ['class' => 'form-check-input']) !!} 方向音痴な性格なので、たとえ歩行中でもスマートフォンのマップアプリは欠かせない。
    </label>
    @error('q4')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q5')) has-error @endif">
    <h3>Q5:ゴミの処分について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q5', '1', null, ['class' => 'form-check-input']) !!} 自分で出したゴミは自分で持って帰る。
    </label>

    <label class="form-check">
        {!! Form::radio('q5', '2', null, ['class' => 'form-check-input']) !!} 目立たない場所に置いて帰る。
    </label>

    <label class="form-check">
        {!! Form::radio('q5', '3', null, ['class' => 'form-check-input']) !!} 火の扱いはキャンプで慣れているし、その場で燃やす。
    </label>
    @error('q5')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q6')) has-error @endif">
    <h3>Q6:100キロハイク中に疲れた時の行動について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q6', '1', null, ['class' => 'form-check-input']) !!} 疲れを感じているのをごまかすために、アルコール飲料を飲む。
    </label>

    <label class="form-check">
        {!! Form::radio('q6', '2', null, ['class' => 'form-check-input']) !!} 密を避け公園などで休憩し、水分・栄養補給やマッサージをする。
    </label>

    <label class="form-check">
        {!! Form::radio('q6', '3', null, ['class' => 'form-check-input']) !!} コンビニなどの前に大勢で座り込み、たっぷり休憩を取る。
    </label>
    @error('q6')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q7')) has-error @endif">
    <h3>Q7:周りの人に迷惑になるようなマナー違反が発覚した場合、運営委員会から出される処置として正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q7', '1', null, ['class' => 'form-check-input']) !!} その場で注意される。
    </label>

    <label class="form-check">
        {!! Form::radio('q7', '2', null, ['class' => 'form-check-input']) !!} 厳重注意の上その場で改善が見られない場合、強制リタイア、記録無効とする。
    </label>

    <label class="form-check">
        {!! Form::radio('q7', '3', null, ['class' => 'form-check-input']) !!} 楽しいイベントに水を差すことはしたくないので目をつむる。
    </label>
    @error('q7')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q8')) has-error @endif">
    <h3>Q8:歩く際の正しい交通ルールついて選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q8', '1', null, ['class' => 'form-check-input']) !!} 1分1秒でも早いタイムでゴールしたいので、車が通っていなければ赤信号や横断歩道を無視した最短コースで歩く。
    </label>

    <label class="form-check">
        {!! Form::radio('q8', '2', null, ['class' => 'form-check-input']) !!} 100キロハイクは競技ではなく訓練なので、急いでいても基本的な交通法規を守り、安全にゴールできるように歩く。
    </label>
    @error('q8')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q9')) has-error @endif">
    <h3>Q9:大会中の携帯電話の扱い方として正しいものを選んでください</h3>
    <label class="form-check">
        {!! Form::radio('q9', '1', null, ['class' => 'form-check-input']) !!} リタイアなど、必要なときに携帯電話を使えるよう、携帯電話は常に電源を切るか機内モードにする。
    </label>

    <label class="form-check">
        {!! Form::radio('q9', '2', null, ['class' => 'form-check-input']) !!} 大会本部から連絡が来るかもしれないので、電源は付けたままにしていつでも出れるようにし、予備バッテリーも持って行く。
    </label>

    <label class="form-check">
        {!! Form::radio('q9', '3', null, ['class' => 'form-check-input']) !!} ただ歩くだけで暇なので、携帯電話で動画を見ながら歩く。
    </label>
    @error('q9')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q10')) has-error @endif">
    <h3>Q10:ゴール後の行動について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q10', '1', null, ['class' => 'form-check-input']) !!} 特に何もせず帰宅し、お風呂で体を休める。
    </label>

    <label class="form-check">
        {!! Form::radio('q10', '2', null, ['class' => 'form-check-input']) !!} 両日、歩行記録アプリ（TATTA）の歩行記録画面をシェアより保存し、その画像をエントリーシステムにアップロードする。検温をして平熱であることを確認する。
    </label>

    <label class="form-check">
        {!! Form::radio('q10', '3', null, ['class' => 'form-check-input']) !!} 完走した仲間と打ち上げをする。
    </label>
    @error('q10')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q11')) has-error @endif">
    <h3>Q11:歩行中転倒して足を擦りむいた場合の処置として正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q11', '1', null, ['class' => 'form-check-input']) !!} 所属団や本部に助けを求めて応急処置してもらう。
    </label>

    <label class="form-check">
        {!! Form::radio('q11', '2', null, ['class' => 'form-check-input']) !!}自分で救急セットを持参し、応急処置する。
    </label>
    @error('q11')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q12')) has-error @endif">
    <h3>Q12:歩行時の服装について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q12', '1', null, ['class' => 'form-check-input']) !!} 長時間歩くのに適した服装で、不織布マスクをつけて歩く。
    </label>

    <label class="form-check">
        {!! Form::radio('q12', '2', null, ['class' => 'form-check-input']) !!} 長時間歩くのに適した服装で、運動用や布マスクをつけて歩く。
    </label>

    <label class="form-check">
        {!! Form::radio('q12', '3', null, ['class' => 'form-check-input']) !!} 歩くと息苦しいためマスクはつけない。
    </label>
    @error('q12')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q13')) has-error @endif">
    <h3>Q13:当日の飲食について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q13', '1', null, ['class' => 'form-check-input']) !!} 友達と食べ物、飲み物をシェアする。
    </label>

    <label class="form-check">
        {!! Form::radio('q13', '2', null, ['class' => 'form-check-input']) !!} 補給食や飲み物は個人で管理し、他の人とシェアをしない。
    </label>
    @error('q13')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q14')) has-error @endif">
    <h3>Q14:コース作成に当たって正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q14', '1', null, ['class' => 'form-check-input']) !!} せっかくなので観光も含めて他県も歩く。
    </label>

    <label class="form-check">
        {!! Form::radio('q14', '2', null, ['class' => 'form-check-input']) !!} 都内のみでコースを作成し、できる限り大通り沿いを通る道を作成する。電波の通じない場所はコースに含めない。
    </label>

    <label class="form-check">
        {!! Form::radio('q14', '3', null, ['class' => 'form-check-input']) !!} なんとなく徒然なるままに歩く。
    </label>
    @error('q14')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q15')) has-error @endif">
    <h3>Q15:コース作成に当たって正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q15', '1', null, ['class' => 'form-check-input']) !!} ローバーリングというし、当日は自由に放浪してみる。無計画でも成功するのがボーイスカウト。
    </label>

    <label class="form-check">
        {!! Form::radio('q15', '2', null, ['class' => 'form-check-input']) !!} 各隊ごとの計画書フォーマットに詳細な計画を記入し、計画書を持参しながら歩行する。
    </label>

    <label class="form-check">
        {!! Form::radio('q15', '3', null, ['class' => 'form-check-input']) !!} 規定の歩行計画書に計画を記入し、自隊隊長及び団委員長の承認を得て実行委員会に提出してから歩行する。
    </label>
    @error('q15')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q16')) has-error @endif">
    <h3>Q16:歩行計測アプリ (TATTA)について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q16', '1', null, ['class' => 'form-check-input']) !!} 歩行の計測は大会参加時間のみ起動して歩行を記録する。充電切れには気をつける。
    </label>

    <label class="form-check">
        {!! Form::radio('q16', '2', null, ['class' => 'form-check-input']) !!} TATTA を起動せずに歩行記録を自分で記録して報告する。
    </label>

    <label class="form-check">
        {!! Form::radio('q16', '3', null, ['class' => 'form-check-input']) !!} コース外を移動する際も距離を稼ぐため計測する。
    </label>
    @error('q16')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q17')) has-error @endif">
    <h3>Q17:TATTAの事前訓練について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q17', '1', null, ['class' => 'form-check-input']) !!} 事前にダウンロードを済ませ、TATTA使用マニュアルで使い方を確認し、実際に一度使って見てから当日に臨む。
    </label>

    <label class="form-check">
        {!! Form::radio('q17', '2', null, ['class' => 'form-check-input']) !!} 直前にダウンロードし、雰囲気で使用し、歩き始めてから１時間後に作動させる。
    </label>

    <label class="form-check">
        {!! Form::radio('q17', '3', null, ['class' => 'form-check-input']) !!} スタンツで鍛えたアドリブ力を駆使してTATTAを初見で使う。
    </label>
    @error('q17')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q18')) has-error @endif">
    <h3>Q18:記録の提出方法について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q18', '1', null, ['class' => 'form-check-input']) !!} TATTAの画面をスクリーンショットし、その写真を提出する。
    </label>

    <label class="form-check">
        {!! Form::radio('q18', '2', null, ['class' => 'form-check-input']) !!} TATTAの画面をシェアより保存してエントリーシステムより提出する。
    </label>
    @error('q18')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q19')) has-error @endif">
    <h3>Q19:事故や事件性を含まない緊急時の対応について正しいものを次のうちから選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q19', '1', null, ['class' => 'form-check-input']) !!} 緊急時のため、至急帰宅する。
    </label>

    <label class="form-check">
        {!! Form::radio('q19', '2', null, ['class' => 'form-check-input']) !!} 自隊指導者に連絡をして対応してもらう。リタイアが伴う場合など歩行継続が困難な場合は大会に連絡する。
    </label>

    <label class="form-check">
        {!! Form::radio('q19', '3', null, ['class' => 'form-check-input']) !!} 自隊で緊急時の対応ができないため、地区ローバーの仲間に助けてもらう。
    </label>
    @error('q19')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q20')) has-error @endif">
    <h3>Q20:事故や事件性を含む緊急時の対応について正しいものを次のうちから選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q20', '1', null, ['class' => 'form-check-input']) !!} 100キロハイク実行委員会のメール問い合わせフォームより事態の報告する。
    </label>

    <label class="form-check">
        {!! Form::radio('q20', '2', null, ['class' => 'form-check-input']) !!} 110番、119番通報を行い、大会本部と自隊指導者に電話にて連絡を行う。
    </label>

    <label class="form-check">
        {!! Form::radio('q20', '3', null, ['class' => 'form-check-input']) !!} 自隊指導者が速やかに対応にあたる。大事にはしないために大会に報告はしない。
    </label>
    @error('q20')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q21')) has-error @endif">
    <h3>Q21:今回の100キロハイクにて使用するアプリを次の内から選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q21', '1', null, ['class' => 'form-check-input']) !!} Googleマップ
    </label>

    <label class="form-check">
        {!! Form::radio('q21', '2', null, ['class' => 'form-check-input']) !!} TOTO
    </label>

    <label class="form-check">
        {!! Form::radio('q21', '3', null, ['class' => 'form-check-input']) !!} TATTA
    </label>

    <label class="form-check">
        {!! Form::radio('q21', '4', null, ['class' => 'form-check-input']) !!} cubook
    </label>
    @error('q21')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q22')) has-error @endif">
    <h3>Q22:隊のサポートについて正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q22', '1', null, ['class' => 'form-check-input']) !!} 荷物を車に詰め込み併走してもらう。
    </label>

    <label class="form-check">
        {!! Form::radio('q22', '2', null, ['class' => 'form-check-input']) !!} 緊急時以外サポートをしてはいけない。
    </label>

    <label class="form-check">
        {!! Form::radio('q22', '3', null, ['class' => 'form-check-input']) !!} 車に乗せてもらい100km走ってもらう。
    </label>
    @error('q22')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q23')) has-error @endif">
    <h3>Q23:歩く時間について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q23', '1', null, ['class' => 'form-check-input']) !!} 11/13,14の中であればぶっ通しで自由に歩いて良い。
    </label>

    <label class="form-check">
        {!! Form::radio('q23', '2', null, ['class' => 'form-check-input']) !!} 11/13,14の朝7:00〜夜19:00までの計24時間の中で100km歩く。
    </label>

    <label class="form-check">
        {!! Form::radio('q23', '3', null, ['class' => 'form-check-input']) !!} 11/14にスタートをすれば良い。
    </label>
    @error('q23')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q24')) has-error @endif">
    <h3>Q24:今大会における検温について、正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q24', '1', null, ['class' => 'form-check-input']) !!} 大会が始まる２週間前より毎日検温を行い記録を残しておく。発熱している場合は大会本部に連絡をする。またスタート、ゴール時、もしくはリタイア時に検温し、報告する。
    </label>

    <label class="form-check">
        {!! Form::radio('q24', '2', null, ['class' => 'form-check-input']) !!} ワクチン打っている場合、検温をする必要はない。
    </label>

    <label class="form-check">
        {!! Form::radio('q24', '3', null, ['class' => 'form-check-input']) !!} 検温は参加者の判断によって行うものであり、必須の行動ではない。
    </label>
    @error('q24')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q25')) has-error @endif">
    <h3>Q25:大会期間両日での歩行終了連絡について正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q25', '1', null, ['class' => 'form-check-input']) !!} 19時までに歩行を終了し、エントリーシステムにて歩行終了の連絡をする。
    </label>

    <label class="form-check">
        {!! Form::radio('q25', '2', null, ['class' => 'form-check-input']) !!} 初日は特に連絡する必要はなく、最終日のみエントリーシステムにて歩行終了連絡をする。
    </label>

    <label class="form-check">
        {!! Form::radio('q25', '3', null, ['class' => 'form-check-input']) !!} 両日とも特に連絡する必要はなく、後日完走した旨を団経由で報告すれば良い。
    </label>
    @error('q26')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q26')) has-error @endif">
    <h3>Q26:コロナウイルス感染時の行動として正しいものを選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q26', '1', null, ['class' => 'form-check-input']) !!} コロナウイルス感染が発覚したので自宅で隔離生活を行う。
    </label>

    <label class="form-check">
        {!! Form::radio('q26', '2', null, ['class' => 'form-check-input']) !!} コロナウイルス感染が分かり次第、団委員長などの責任者に連絡し、地区コミッショナー経由で東京連盟に報告する。
    </label>

    <label class="form-check">
        {!! Form::radio('q26', '3', null, ['class' => 'form-check-input']) !!} どうしても100km歩きたいので黙って歩く。
    </label>
    @error('q26')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q27')) has-error @endif">
    <h3>Q27:携帯の充電が切れてしまい、予備バッテリーもない場合の正しい行動を選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q27', '1', null, ['class' => 'form-check-input']) !!} どうしようもないので諦める。
    </label>

    <label class="form-check">
        {!! Form::radio('q27', '2', null, ['class' => 'form-check-input']) !!} 公衆電話などの公共利用が可能な連絡手段を用いて所属隊に連絡する。
    </label>

    <label class="form-check">
        {!! Form::radio('q27', '3', null, ['class' => 'form-check-input']) !!} 携帯をいい感じに温めてバッテリー残量の回復を試みる。
    </label>
    @error('q27')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q28')) has-error @endif">
    <h3>Q28:迷子になってしまった場合の正しい行動を選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q28', '1', null, ['class' => 'form-check-input']) !!} 所属隊に連絡をし、状況を説明し、指示を仰ぐ。
    </label>

    <label class="form-check">
        {!! Form::radio('q28', '2', null, ['class' => 'form-check-input']) !!} 自力でなんとかする。
    </label>

    <label class="form-check">
        {!! Form::radio('q28', '3', null, ['class' => 'form-check-input']) !!} 交番に行く。
    </label>
    @error('q28')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 @if ($errors->has('q29')) has-error @endif">
    <h3>Q29:TATTAを使用するスマートフォンの正しい設定を選んでください。</h3>
    <label class="form-check">
        {!! Form::radio('q29', '1', null, ['class' => 'form-check-input']) !!} バッテリーを長持ちさせたいので「省電力モード」や「バッテリーセーバー」等をONにする。
    </label>

    <label class="form-check">
        {!! Form::radio('q29', '2', null, ['class' => 'form-check-input']) !!} モバイルバッテリーを用意し、「省電力モード）「バッテリーセーバー」等をOFFにする。
    </label>
    @error('q29')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>
