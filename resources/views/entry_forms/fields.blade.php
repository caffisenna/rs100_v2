<script src="{{ url('js/yubinbango.js') }}" charset="UTF-8"></script>
<div class="card col-sm-6">
    <div class="card-header">
        <h3>個人情報</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('furigana', '氏名:') !!}
            {{ Auth::user()->name }}
        </div>


        <!-- Furigana Field -->
        <div class="form-group">
            {!! Form::label('furigana', 'ふりがな:') !!}
            {!! Form::text('furigana', null, ['class' => 'form-control', 'placeholder' => 'ひらがな/カタカナ可']) !!}
            @error('furigana')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Birth Day Field -->
        <div class="form-group">
            {!! Form::label('birth_day', '生年月日') !!}
            <div class="form-row">
                <div class="col">
                    {{-- {!! Form::text('bd_year', null, ['class' => 'form-control', 'maxlength' => '4', 'placeholder' => '西暦']) !!} --}}
                    {!! Form::select('bd_year', array_combine(range(2005, 1960), range(2005, 1960)), null, [
                        'class' => 'form-control custom-select',
                    ]) !!}
                </div>
                <div class="col">
                    {{-- {!! Form::text('bd_month', null, ['class' => 'form-control', 'maxlength' => '2', 'placeholder' => '月']) !!} --}}
                    {!! Form::select('bd_month', array_combine(range(1, 12), range(1, 12)), null, [
                        'class' => 'form-control custom-select',
                    ]) !!}
                </div>
                <div class="col">
                    {{-- {!! Form::text('bd_day', null, ['class' => 'form-control', 'maxlength' => '2', 'placeholder' => '日']) !!} --}}
                    {!! Form::select('bd_day', array_combine(range(1, 31), range(1, 31)), null, [
                        'class' => 'form-control custom-select',
                    ]) !!}


                </div>
            </div>
            @error('bd_year')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
            @error('bd_month')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
            @error('bd_day')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- @push('page_scripts')
            <script type="text/javascript">
                $('#birth_day').datepicker({
                    format: 'yyyy-mm-dd',
                    useCurrent: true,
                    sideBySide: true,
                    language: 'ja',
                    autoclose: true
                })
            </script>
        @endpush --}}

        <!-- Gender Field -->
        <div class="form-group">
            {!! Form::label('gender', '性別:') !!}
            {!! Form::select('gender', ['' => '', '男' => '男', '女' => '女'], null, [
                'class' => 'form-control custom-select',
            ]) !!}
            @error('gender')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Zip Field -->
        <div class="form-group">
            {!! Form::label('zip', '住所:') !!}
            <div class="h-adr">
                <span class="p-country-name" style="display:none;">Japan</span>
                {!! Form::text('zip', null, [
                    'class' => 'p-postal-code form-control',
                    'placeholder' => '郵便番号を7桁の整数で入力(例: 1510071)',
                ]) !!}
                {!! Form::text('address', null, [
                    'class' => 'p-region p-locality p-street-address p-extended-address form-control',
                    'placeholder' => '住所が自動で補完されます。番地以降を追記入力してください。',
                ]) !!}
            </div>
        </div>

        <!-- Telephone Field -->
        <div class="form-group">
            {!! Form::label('telephone', '電話番号(自宅):') !!}
            {!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => '自宅の固定電話など']) !!}

            @error('telephone')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Cellphone Field -->
        <div class="form-group">
            {!! Form::label('cellphone', 'ケータイ番号:') !!}
            {!! Form::text('cellphone', null, [
                'class' => 'form-control',
                'placeholder' => '08012345678(ハイク中連絡がとれるもの)',
            ]) !!}
            <p class="text-xs">歩行時に連絡が取れるケータイ番号</p>
            @error('cellphone')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- 50Km Exp Field -->
        <div class="form-group">
            {!! Form::label('exp_50km_exp', '長距離ハイクの経験:') !!}
            {!! Form::select(
                'exp_50km',
                [
                    '' => '',
                    '50km' => '50kmハイクの経験あり',
                    '100km' => '100kmハイクの経験あり',
                    '50km&100km' => '50kmと100kmハイクの経験あり',
                    'なし' => 'なし',
                ],
                null,
                [
                    'class' => 'form-control custom-select',
                ],
            ) !!}
            @error('exp_50km')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- captain Field -->
        <div class="form-group">
            {!! Form::label('captain', '主将や幹事などの代表者:') !!}
            {!! Form::select(
                'captain',
                [
                    '' => '',
                    'captain' => '主将などの代表者である',
                ],
                null,
                [
                    'class' => 'form-control custom-select',
                ],
            ) !!}
            @error('captain')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>

<div class="w-100"></div>

<div class="card col-sm-6">
    <div class="card-header">
        <h3>所属情報</h3>
    </div>
    <div class="card-body">
        {{-- BSかGSか --}}
        <div class="form-group">
            {!! Form::label('bs_gs', '所属:') !!}
            {!! Form::select('bs_gs', ['' => '', 'BS' => 'ボーイスカウト', 'GS' => 'ガールスカウト'], null, [
                'class' => 'form-control custom-select',
            ]) !!}
            @error('bs_gs')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- BSかGSか --}}

        {{-- 現役 or OB --}}
        <div class="form-group">
            {!! Form::label('generation', '年代:') !!}
            {!! Form::select(
                'generation',
                ['' => '', '現役' => '現役スカウト', 'オーバーエイジ' => 'オーバーエイジ'],
                null,
                [
                    'class' => 'form-control custom-select',
                ],
            ) !!}
            @error('generation')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- 現役 or OB --}}

        <!-- Bs Id Field -->
        <div class="form-group">
            {!! Form::label('bs_id', '登録番号:') !!}
            {!! Form::number('bs_id', null, [
                'class' => 'form-control',
                'placeholder' => '登録証で確認してください',
                'maxlength' => '10',
            ]) !!}
            @error('bs_id')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- 県連盟 --}}
        <div class="form-group">
            {!! Form::label('prefecture', '県連盟:') !!}
            {!! Form::select(
                'prefecture',
                [
                    '' => '',
                    '北海道' => '北海道',
                    '青森' => '青森',
                    '岩手' => '岩手',
                    '宮城' => '宮城',
                    '秋田' => '秋田',
                    '山形' => '山形',
                    '福島' => '福島',
                    '茨城' => '茨城',
                    '栃木' => '栃木',
                    '群馬' => '群馬',
                    '埼玉' => '埼玉',
                    '千葉' => '千葉',
                    '神奈川' => '神奈川',
                    '山梨' => '山梨',
                    '東京' => '東京',
                    '新潟' => '新潟',
                    '富山' => '富山',
                    '石川' => '石川',
                    '福井' => '福井',
                    '長野' => '長野',
                    '岐阜' => '岐阜',
                    '静岡' => '静岡',
                    '愛知' => '愛知',
                    '三重' => '三重',
                    '滋賀' => '滋賀',
                    '京都' => '京都',
                    '兵庫' => '兵庫',
                    '奈良' => '奈良',
                    '和歌山' => '和歌山',
                    '大阪' => '大阪',
                    '鳥取' => '鳥取',
                    '島根' => '島根',
                    '岡山' => '岡山',
                    '広島' => '広島',
                    '山口' => '山口',
                    '徳島' => '徳島',
                    '香川' => '香川',
                    '愛媛' => '愛媛',
                    '高知' => '高知',
                    '福岡' => '福岡',
                    '佐賀' => '佐賀',
                    '長崎' => '長崎',
                    '熊本' => '熊本',
                    '大分' => '大分',
                    '宮崎' => '宮崎',
                    '鹿児島' => '鹿児島',
                    '沖縄' => '沖縄',
                ],
                null,
                ['class' => 'form-control custom-select'],
            ) !!}
            @error('prefecture')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- 県連盟 --}}

        <!-- District Field -->
        <div class="form-group">
            {!! Form::label('district', '地区:(地区がない場合は「なし」と入力)') !!}
            {!! Form::text('district', null, ['class' => 'form-control', 'placeholder' => '地区名を入力してください']) !!}
            @error('district')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>


        <!-- Dan Name Field -->
        <div class="form-group">
            {!! Form::label('dan_name', '団名:') !!}
            {!! Form::text('dan_name', null, ['class' => 'form-control', 'placeholder' => '荻窪第1団の場合、荻窪1と入力']) !!}
        </div>
        @error('dan_name')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="w-100"></div>


<div class="card col-sm-6">
    <div class="card-header">
        <h3>緊急連絡先</h3>
    </div>
    <div class="card-body">
        <!-- Parent Name Field -->
        <div class="form-group">
            {!! Form::label('parent_name', '氏名:') !!}
            {!! Form::text('parent_name', null, ['class' => 'form-control']) !!}
            @error('parent_name')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Parent Name Furigana Field -->
        <div class="form-group">
            {!! Form::label('parent_name_furigana', 'ふりがな:') !!}
            {!! Form::text('parent_name_furigana', null, ['class' => 'form-control']) !!}
            @error('parent_name_furigana')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Parent Relation Field -->
        <div class="form-group">
            {!! Form::label('parent_relation', '続柄:') !!}
            {!! Form::text('parent_relation', null, ['class' => 'form-control', 'placeholder' => '父、母など']) !!}
            @error('parent_relation')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Emer Phone Field -->
        <div class="form-group">
            {!! Form::label('emer_phone', '緊急連絡先電話番号:') !!}
            {!! Form::text('emer_phone', null, ['class' => 'form-control']) !!}
            @error('emer_phone')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="w-100"></div>

<div class="card col-sm-6">
    <div class="card-header">
        <h3>隊長・団委員長</h3>
    </div>
    <div class="card-body">
        <!-- Sm Name Field -->
        <div class="form-group">
            {!! Form::label('sm_name', '隊長もしくは団委員長氏名:') !!}
            {!! Form::text('sm_name', null, ['class' => 'form-control']) !!}
            @error('sm_name')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Sm Position Field -->
        <div class="form-group">
            {!! Form::label('sm_position', '役務:') !!}
            {!! Form::select('sm_position', ['' => '', 'RS隊長' => 'RS隊長', '団委員長' => '団委員長'], null, [
                'class' => 'form-control custom-select',
            ]) !!}
            @error('sm_position')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>

<div class="w-100"></div>

<div class="card col-sm-6">
    <div class="card-header">
        <h3>バディについて</h3>
        <span class="uk-text-warning uk-text-small">バディとは一緒に歩くパートナーのことです。女性の参加者は必ず男性のバディと歩行することが必要です。<br>
            女性1名と男性1名、女性2名と男性1名、女性1名と男性2名などの組み合わせで登録してください。<br>
            組み合わせは実行委員会で確認します。<br>
            オーバーエイジの女性に限り、男性と同じく単独歩行が認められます。
        </span>
    </div>
    <div class="card-body">
        {{-- バディの可否(男性のみ) --}}
        <div class="form-group">
            {!! Form::label('buddy_ok', 'バディの可否(男性のみ):') !!}
            <span class="uk-text-warning uk-text-small">実行委員会からの要請でバディの引き受けが可能か教えてください。(女性のみの参加者サポートのため)</span>
            {!! Form::select('buddy_ok', ['' => '', 'バディOK' => 'バディOK', 'バディNG' => 'バディNG'], null, [
                'class' => 'form-control custom-select',
            ]) !!}
            @error('buddy_ok')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- バディの可否(男性のみ) --}}

        {{-- バディの斡旋(女性のみ) --}}
        <div class="form-group">
            {!! Form::label('buddy_match', 'バディの紹介(女性のみ):') !!}
            <span class="uk-text-warning uk-text-small">女性の参加希望者で一緒に歩く男性がまだ未定の方(実行委員会から男性のバディをご紹介します)</sp>
                {!! Form::select(
                    'buddy_match',
                    [
                        '' => '',
                        'バディの紹介を希望' => 'バディの紹介を希望',
                        '男性バディが決まっている' => '男性バディが決まっている',
                        'オーバーエイジの女性で単独歩行する' => 'オーバーエイジの女性で単独歩行する',
                    ],
                    null,
                    [
                        'class' => 'form-control custom-select',
                    ],
                ) !!}
                @error('buddy_match')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
        </div>
        {{-- バディの斡旋(女性のみ) --}}

    </div>
</div>

<div class="w-100"></div>

<div class="card col-sm-6">
    <div class="card-header">
        <h3>バディ詳細</h3>
    </div>
    <div class="card-body">
        <span class="">バディの情報を入力してください</span>
        <h4>バディのタイプ</h4>
        <div class="form-group">
            {!! Form::label('buddy_type', 'バディのタイプ:') !!}
            {!! Form::select(
                'buddy_type',
                [
                    '' => '',
                    '男性単独' => '男性単独',
                    '女性単独(オーバーエイジ)' => '女性単独(オーバーエイジ)',
                    '男1/女1' => '男1/女1',
                    '男1/女2' => '男1/女2',
                    '男2/女1' => '男2/女1',
                ],
                null,
                ['class' => 'form-control custom-select'],
            ) !!}
            @error('buddy_type')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <h4>バディ1</h4>
        <div class="form-group">
            {!! Form::label('buddy1_name', 'バディ(1)氏名:') !!}
            {!! Form::text('buddy1_name', null, ['class' => 'form-control']) !!}
            @error('buddy1_name')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('buddy1_dan', 'バディ(1)所属団:') !!}
            {!! Form::text('buddy1_dan', null, ['class' => 'form-control', 'placeholder' => '〇〇連盟〇〇地区〇〇XX団']) !!}
            @error('buddy1_dan')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <h4>バディ2</h4>
        <div class="form-group">
            {!! Form::label('buddy2_name', 'バディ(2)氏名:') !!}
            {!! Form::text('buddy2_name', null, ['class' => 'form-control']) !!}
            @error('buddy2_name')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('buddy2_dan', 'バディ(2)所属団:') !!}
            {!! Form::text('buddy2_dan', null, ['class' => 'form-control', 'placeholder' => '〇〇連盟〇〇地区〇〇XX団']) !!}
            @error('buddy2_dan')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>
