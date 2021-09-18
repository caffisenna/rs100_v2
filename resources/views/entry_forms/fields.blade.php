<div class="card col-sm-6">
    <div class="card-header">
        個人情報
    </div>
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('furigana', '氏名:') !!}
            {{ Auth::user()->name }}
        </div>


        <!-- Furigana Field -->
        <div class="form-group">
            {!! Form::label('furigana', 'ふりがな:') !!}
            {!! Form::text('furigana', null, ['class' => 'form-control']) !!}
            <p class="text-xs">ひらがな/カタカナ可</p>
            @error('furigana')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Birth Day Field -->
        <div class="form-group">
            {!! Form::label('birth_day', '生年月日') !!}
            <div class="form-row">
                <div class="col">
                    {!! Form::text('bd_year', null, ['class' => 'form-control', 'maxlength' => '4', 'placeholder' => '西暦']) !!}
                </div>
                <div class="col">
                    {!! Form::text('bd_month', null, ['class' => 'form-control', 'maxlength' => '2', 'placeholder' => '月']) !!}
                </div>
                <div class="col">
                    {!! Form::text('bd_day', null, ['class' => 'form-control', 'maxlength' => '2', 'placeholder' => '日']) !!}
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
            {!! Form::select('gender', ['' => '', '男' => '男', '女' => '女'], null, ['class' => 'form-control custom-select']) !!}
            @error('gender')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>


        <!-- Zip Field -->
        <div class="form-group">
            {!! Form::label('zip', '郵便番号:') !!}
            {!! Form::text('zip', null, ['class' => 'form-control', 'maxlength' => '7']) !!}
            <p class="text-xs">7桁の整数で入力してください</p>
            @error('zip')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Address Field -->
        <div class="form-group">
            {!! Form::label('address', '住所:') !!}
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => '番地まで正確に']) !!}
            <p class="text-xs">番地、部屋番号まで正確に入力してください</p>
            @error('address')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Telephone Field -->
        <div class="form-group">
            {!! Form::label('telephone', '電話番号(自宅):') !!}
            {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
            <p class="text-xs">自宅の固定電話など</p>
            @error('telephone')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Cellphone Field -->
        <div class="form-group">
            {!! Form::label('cellphone', 'ケータイ番号:') !!}
            {!! Form::text('cellphone', null, ['class' => 'form-control', 'placeholder' => '08012345678(ハイク中連絡がとれるもの)']) !!}
            <p class="text-xs">歩行時に連絡が取れるケータイ番号</p>
            @error('cellphone')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- 50Km Exp Field -->
        <div class="form-group">
            {!! Form::label('exp_50km_exp', '50kmハイクの経験:') !!}
            {!! Form::select('exp_50km', ['' => '', 'あり' => 'あり', 'なし' => 'なし'], null, ['class' => 'form-control custom-select']) !!}
            @error('exp_50km')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>

<div class="w-100"></div>

<div class="card col-sm-6">
    <div class="card-header">
        所属
    </div>
    <div class="card-body">
        <!-- Bs Id Field -->
        <div class="form-group">
            {!! Form::label('bs_id', '登録番号:') !!}
            {!! Form::number('bs_id', null, ['class' => 'form-control', 'placeholder' => '登録証で確認', 'maxlength' => '10']) !!}
            @error('bs_id')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- District Field -->
        <div class="form-group">
            {!! Form::label('district', '地区:') !!}
            {!! Form::select(
    'district',
    [
        '' => '',
        '大都心' => '大都心',
        'さくら' => 'さくら',
        '城東' => '城東',
        '山手' => '山手',
        'つばさ' => 'つばさ',
        '世田谷' => '世田谷',
        'あすなろ' => 'あすなろ',
        '城北' => '城北',
        '練馬' => '練馬',
        '多摩西' => '多摩西',
        '新多磨' => '新多磨',
        '南武蔵野' => '南武蔵野',
        '町田' => '町田',
        '北多摩' => '北多摩',
    ],
    null,
    ['class' => 'form-control custom-select parent'],
) !!}
            @error('district')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>


        <!-- Dan Name Field -->
        <div class="form-group">
            {!! Form::label('dan_name', '団名:') !!}
            <select class="children form-control" name="dan_name">
                <option value="" selected="selected">団を選択</option>
                <option value="千代田7" data-val="大都心" @if (old('dan_name') == '千代田7') selected @endif>千代田7</option>
                <option value="千代田8" data-val="大都心" @if (old('dan_name') == '千代田8') selected @endif>千代田8</option>
                <option value="千代田9" data-val="大都心" @if (old('dan_name') == '千代田9') selected @endif>千代田9</option>
                <option value="千代田10" data-val="大都心" @if (old('dan_name') == '千代田10') selected @endif>千代田10</option>
                <option value="千代田11" data-val="大都心" @if (old('dan_name') == '千代田11') selected @endif>千代田11</option>
                <option value="中央5" data-val="大都心" @if (old('dan_name') == '中央5') selected @endif>中央5</option>
                <option value="中央6" data-val="大都心" @if (old('dan_name') == '中央6') selected @endif>中央6</option>
                <option value="中央7" data-val="大都心" @if (old('dan_name') == '中央7') selected @endif>中央7</option>
                <option value="中央10" data-val="大都心" @if (old('dan_name') == '中央10') selected @endif>中央10</option>
                <option value="中央11" data-val="大都心" @if (old('dan_name') == '中央11') selected @endif>中央11</option>
                <option value="港1" data-val="大都心" @if (old('dan_name') == '港1') selected @endif>港1</option>
                <option value="港3" data-val="大都心" @if (old('dan_name') == '港3') selected @endif>港3</option>
                <option value="港5" data-val="大都心" @if (old('dan_name') == '港5') selected @endif>港5</option>
                <option value="港12" data-val="大都心" @if (old('dan_name') == '港12') selected @endif>港12</option>
                <option value="港14" data-val="大都心" @if (old('dan_name') == '港14') selected @endif>港14</option>
                <option value="港15" data-val="大都心" @if (old('dan_name') == '港15') selected @endif>港15</option>
                <option value="港16" data-val="大都心" @if (old('dan_name') == '港16') selected @endif>港16</option>
                <option value="港18" data-val="大都心" @if (old('dan_name') == '港18') selected @endif>港18</option>
                <option value="新宿1" data-val="大都心" @if (old('dan_name') == '新宿1') selected @endif>新宿1</option>
                <option value="新宿2" data-val="大都心" @if (old('dan_name') == '新宿2') selected @endif>新宿2</option>
                <option value="新宿4" data-val="大都心" @if (old('dan_name') == '新宿4') selected @endif>新宿4</option>
                <option value="新宿8" data-val="大都心" @if (old('dan_name') == '新宿8') selected @endif>新宿8</option>
                <option value="新宿9" data-val="大都心" @if (old('dan_name') == '新宿9') selected @endif>新宿9</option>
                <option value="新宿17" data-val="大都心" @if (old('dan_name') == '新宿17') selected @endif>新宿17</option>
                <option value="新宿18" data-val="大都心" @if (old('dan_name') == '新宿18') selected @endif>新宿18</option>
                <option value="台東1" data-val="さくら" @if (old('dan_name') == '台東1') selected @endif>台東1</option>
                <option value="台東2" data-val="さくら" @if (old('dan_name') == '台東2') selected @endif>台東2</option>
                <option value="台東3" data-val="さくら" @if (old('dan_name') == '台東3') selected @endif>台東3</option>
                <option value="台東4" data-val="さくら" @if (old('dan_name') == '台東4') selected @endif>台東4</option>
                <option value="台東7" data-val="さくら" @if (old('dan_name') == '台東7') selected @endif>台東7</option>
                <option value="文京1" data-val="さくら" @if (old('dan_name') == '文京1') selected @endif>文京1</option>
                <option value="文京2" data-val="さくら" @if (old('dan_name') == '文京2') selected @endif>文京2</option>
                <option value="文京3" data-val="さくら" @if (old('dan_name') == '文京3') selected @endif>文京3</option>
                <option value="文京5" data-val="さくら" @if (old('dan_name') == '文京5') selected @endif>文京5</option>
                <option value="文京6" data-val="さくら" @if (old('dan_name') == '文京6') selected @endif>文京6</option>
                <option value="荒川1" data-val="さくら" @if (old('dan_name') == '荒川1') selected @endif>荒川1</option>
                <option value="荒川2" data-val="さくら" @if (old('dan_name') == '荒川2') selected @endif>荒川2</option>
                <option value="荒川6" data-val="さくら" @if (old('dan_name') == '荒川6') selected @endif>荒川6</option>
                <option value="足立3" data-val="さくら" @if (old('dan_name') == '足立3') selected @endif>足立3</option>
                <option value="足立4" data-val="さくら" @if (old('dan_name') == '足立4') selected @endif>足立4</option>
                <option value="足立5" data-val="さくら" @if (old('dan_name') == '足立5') selected @endif>足立5</option>
                <option value="足立14" data-val="さくら" @if (old('dan_name') == '足立14') selected @endif>足立14</option>
                <option value="江戸川1" data-val="城東" @if (old('dan_name') == '江戸川1') selected @endif>江戸川1</option>
                <option value="江戸川2" data-val="城東" @if (old('dan_name') == '江戸川2') selected @endif>江戸川2</option>
                <option value="江戸川3" data-val="城東" @if (old('dan_name') == '江戸川3') selected @endif>江戸川3</option>
                <option value="江戸川5" data-val="城東" @if (old('dan_name') == '江戸川5') selected @endif>江戸川5</option>
                <option value="江戸川7" data-val="城東" @if (old('dan_name') == '江戸川7') selected @endif>江戸川7</option>
                <option value="葛飾2" data-val="城東" @if (old('dan_name') == '葛飾2') selected @endif>葛飾2</option>
                <option value="葛飾3" data-val="城東" @if (old('dan_name') == '葛飾3') selected @endif>葛飾3</option>
                <option value="葛飾4" data-val="城東" @if (old('dan_name') == '葛飾4') selected @endif>葛飾4</option>
                <option value="葛飾5" data-val="城東" @if (old('dan_name') == '葛飾5') selected @endif>葛飾5</option>
                <option value="葛飾9" data-val="城東" @if (old('dan_name') == '葛飾9') selected @endif>葛飾9</option>
                <option value="江東2" data-val="城東" @if (old('dan_name') == '江東2') selected @endif>江東2</option>
                <option value="江東3" data-val="城東" @if (old('dan_name') == '江東3') selected @endif>江東3</option>
                <option value="江東6" data-val="城東" @if (old('dan_name') == '江東6') selected @endif>江東6</option>
                <option value="墨田3" data-val="城東" @if (old('dan_name') == '墨田3') selected @endif>墨田3</option>
                <option value="墨田4" data-val="城東" @if (old('dan_name') == '墨田4') selected @endif>墨田4</option>
                <option value="墨田8" data-val="城東" @if (old('dan_name') == '墨田8') selected @endif>墨田8</option>
                <option value="墨田9" data-val="城東" @if (old('dan_name') == '墨田9') selected @endif>墨田9</option>
                <option value="目黒1" data-val="山手" @if (old('dan_name') == '目黒1') selected @endif>目黒1</option>
                <option value="目黒3" data-val="山手" @if (old('dan_name') == '目黒3') selected @endif>目黒3</option>
                <option value="目黒6" data-val="山手" @if (old('dan_name') == '目黒6') selected @endif>目黒6</option>
                <option value="目黒7" data-val="山手" @if (old('dan_name') == '目黒7') selected @endif>目黒7</option>
                <option value="目黒8" data-val="山手" @if (old('dan_name') == '目黒8') selected @endif>目黒8</option>
                <option value="目黒9" data-val="山手" @if (old('dan_name') == '目黒9') selected @endif>目黒9</option>
                <option value="目黒15" data-val="山手" @if (old('dan_name') == '目黒15') selected @endif>目黒15</option>
                <option value="渋谷2" data-val="山手" @if (old('dan_name') == '渋谷2') selected @endif>渋谷2</option>
                <option value="渋谷5" data-val="山手" @if (old('dan_name') == '渋谷5') selected @endif>渋谷5</option>
                <option value="渋谷6" data-val="山手" @if (old('dan_name') == '渋谷6') selected @endif>渋谷6</option>
                <option value="渋谷9" data-val="山手" @if (old('dan_name') == '渋谷9') selected @endif>渋谷9</option>
                <option value="渋谷10" data-val="山手" @if (old('dan_name') == '渋谷10') selected @endif>渋谷10</option>
                <option value="渋谷14" data-val="山手" @if (old('dan_name') == '渋谷14') selected @endif>渋谷14</option>
                <option value="品川1" data-val="つばさ" @if (old('dan_name') == '品川1') selected @endif>品川1</option>
                <option value="品川2" data-val="つばさ" @if (old('dan_name') == '品川2') selected @endif>品川2</option>
                <option value="品川6" data-val="つばさ" @if (old('dan_name') == '品川6') selected @endif>品川6</option>
                <option value="品川8" data-val="つばさ" @if (old('dan_name') == '品川8') selected @endif>品川8</option>
                <option value="大田1" data-val="つばさ" @if (old('dan_name') == '大田1') selected @endif>大田1</option>
                <option value="大田2" data-val="つばさ" @if (old('dan_name') == '大田2') selected @endif>大田2</option>
                <option value="大田3" data-val="つばさ" @if (old('dan_name') == '大田3') selected @endif>大田3</option>
                <option value="大田4" data-val="つばさ" @if (old('dan_name') == '大田4') selected @endif>大田4</option>
                <option value="大田6" data-val="つばさ" @if (old('dan_name') == '大田6') selected @endif>大田6</option>
                <option value="大田7" data-val="つばさ" @if (old('dan_name') == '大田7') selected @endif>大田7</option>
                <option value="大田11" data-val="つばさ" @if (old('dan_name') == '大田11') selected @endif>大田11</option>
                <option value="大田14" data-val="つばさ" @if (old('dan_name') == '大田14') selected @endif>大田14</option>
                <option value="大田15" data-val="つばさ" @if (old('dan_name') == '大田15') selected @endif>大田15</option>
                <option value="大田17" data-val="つばさ" @if (old('dan_name') == '大田17') selected @endif>大田17</option>
                <option value="大田18" data-val="つばさ" @if (old('dan_name') == '大田18') selected @endif>大田18</option>
                <option value="大田19" data-val="つばさ" @if (old('dan_name') == '大田19') selected @endif>大田19</option>
                <option value="世田谷1" data-val="世田谷" @if (old('dan_name') == '世田谷1') selected @endif>世田谷1</option>
                <option value="世田谷2" data-val="世田谷" @if (old('dan_name') == '世田谷2') selected @endif>世田谷2</option>
                <option value="世田谷3" data-val="世田谷" @if (old('dan_name') == '世田谷3') selected @endif>世田谷3</option>
                <option value="世田谷4" data-val="世田谷" @if (old('dan_name') == '世田谷4') selected @endif>世田谷4</option>
                <option value="世田谷5" data-val="世田谷" @if (old('dan_name') == '世田谷5') selected @endif>世田谷5</option>
                <option value="世田谷6" data-val="世田谷" @if (old('dan_name') == '世田谷6') selected @endif>世田谷6</option>
                <option value="世田谷7" data-val="世田谷" @if (old('dan_name') == '世田谷7') selected @endif>世田谷7</option>
                <option value="世田谷8" data-val="世田谷" @if (old('dan_name') == '世田谷8') selected @endif>世田谷8</option>
                <option value="世田谷9" data-val="世田谷" @if (old('dan_name') == '世田谷9') selected @endif>世田谷9</option>
                <option value="世田谷10" data-val="世田谷" @if (old('dan_name') == '世田谷10') selected @endif>世田谷10</option>
                <option value="世田谷11" data-val="世田谷" @if (old('dan_name') == '世田谷11') selected @endif>世田谷11</option>
                <option value="世田谷12" data-val="世田谷" @if (old('dan_name') == '世田谷12') selected @endif>世田谷12</option>
                <option value="世田谷14" data-val="世田谷" @if (old('dan_name') == '世田谷14') selected @endif>世田谷14</option>
                <option value="世田谷15" data-val="世田谷" @if (old('dan_name') == '世田谷15') selected @endif>世田谷15</option>
                <option value="世田谷16" data-val="世田谷" @if (old('dan_name') == '世田谷16') selected @endif>世田谷16</option>
                <option value="世田谷19" data-val="世田谷" @if (old('dan_name') == '世田谷19') selected @endif>世田谷19</option>
                <option value="世田谷20" data-val="世田谷" @if (old('dan_name') == '世田谷20') selected @endif>世田谷20</option>
                <option value="世田谷22" data-val="世田谷" @if (old('dan_name') == '世田谷22') selected @endif>世田谷22</option>
                <option value="世田谷23" data-val="世田谷" @if (old('dan_name') == '世田谷23') selected @endif>世田谷23</option>
                <option value="世田谷24" data-val="世田谷" @if (old('dan_name') == '世田谷24') selected @endif>世田谷24</option>
                <option value="世田谷25" data-val="世田谷" @if (old('dan_name') == '世田谷25') selected @endif>世田谷25</option>
                <option value="中野3" data-val="あすなろ" @if (old('dan_name') == '中野3') selected @endif>中野3</option>
                <option value="中野5" data-val="あすなろ" @if (old('dan_name') == '中野5') selected @endif>中野5</option>
                <option value="中野8" data-val="あすなろ" @if (old('dan_name') == '中野8') selected @endif>中野8</option>
                <option value="中野11" data-val="あすなろ" @if (old('dan_name') == '中野11') selected @endif>中野11</option>
                <option value="杉並2" data-val="あすなろ" @if (old('dan_name') == '杉並2') selected @endif>杉並2</option>
                <option value="杉並3" data-val="あすなろ" @if (old('dan_name') == '杉並3') selected @endif>杉並3</option>
                <option value="杉並4" data-val="あすなろ" @if (old('dan_name') == '杉並4') selected @endif>杉並4</option>
                <option value="杉並5" data-val="あすなろ" @if (old('dan_name') == '杉並5') selected @endif>杉並5</option>
                <option value="杉並6" data-val="あすなろ" @if (old('dan_name') == '杉並6') selected @endif>杉並6</option>
                <option value="杉並9" data-val="あすなろ" @if (old('dan_name') == '杉並9') selected @endif>杉並9</option>
                <option value="杉並11" data-val="あすなろ" @if (old('dan_name') == '杉並11') selected @endif>杉並11</option>
                <option value="杉並12" data-val="あすなろ" @if (old('dan_name') == '杉並12') selected @endif>杉並12</option>
                <option value="杉並13" data-val="あすなろ" @if (old('dan_name') == '杉並13') selected @endif>杉並13</option>
                <option value="豊島1" data-val="城北" @if (old('dan_name') == '豊島1') selected @endif>豊島1</option>
                <option value="豊島4" data-val="城北" @if (old('dan_name') == '豊島4') selected @endif>豊島4</option>
                <option value="豊島6" data-val="城北" @if (old('dan_name') == '豊島6') selected @endif>豊島6</option>
                <option value="豊島7" data-val="城北" @if (old('dan_name') == '豊島7') selected @endif>豊島7</option>
                <option value="豊島8" data-val="城北" @if (old('dan_name') == '豊島8') selected @endif>豊島8</option>
                <option value="豊島9" data-val="城北" @if (old('dan_name') == '豊島9') selected @endif>豊島9</option>
                <option value="豊島17" data-val="城北" @if (old('dan_name') == '豊島17') selected @endif>豊島17</option>
                <option value="北1" data-val="城北" @if (old('dan_name') == '北1') selected @endif>北1</option>
                <option value="北3" data-val="城北" @if (old('dan_name') == '北3') selected @endif>北3</option>
                <option value="北5" data-val="城北" @if (old('dan_name') == '北5') selected @endif>北5</option>
                <option value="北8" data-val="城北" @if (old('dan_name') == '北8') selected @endif>北8</option>
                <option value="北11" data-val="城北" @if (old('dan_name') == '北11') selected @endif>北11</option>
                <option value="板橋2" data-val="城北" @if (old('dan_name') == '板橋2') selected @endif>板橋2</option>
                <option value="板橋3" data-val="城北" @if (old('dan_name') == '板橋3') selected @endif>板橋3</option>
                <option value="板橋4" data-val="城北" @if (old('dan_name') == '板橋4') selected @endif>板橋4</option>
                <option value="板橋5" data-val="城北" @if (old('dan_name') == '板橋5') selected @endif>板橋5</option>
                <option value="板橋7" data-val="城北" @if (old('dan_name') == '板橋7') selected @endif>板橋7</option>
                <option value="板橋9" data-val="城北" @if (old('dan_name') == '板橋9') selected @endif>板橋9</option>
                <option value="板橋10" data-val="城北" @if (old('dan_name') == '板橋10') selected @endif>板橋10</option>
                <option value="板橋11" data-val="城北" @if (old('dan_name') == '板橋11') selected @endif>板橋11</option>
                <option value="板橋15" data-val="城北" @if (old('dan_name') == '板橋15') selected @endif>板橋15</option>
                <option value="練馬1" data-val="練馬" @if (old('dan_name') == '練馬1') selected @endif>練馬1</option>
                <option value="練馬3" data-val="練馬" @if (old('dan_name') == '練馬3') selected @endif>練馬3</option>
                <option value="練馬4" data-val="練馬" @if (old('dan_name') == '練馬4') selected @endif>練馬4</option>
                <option value="練馬5" data-val="練馬" @if (old('dan_name') == '練馬5') selected @endif>練馬5</option>
                <option value="練馬6" data-val="練馬" @if (old('dan_name') == '練馬6') selected @endif>練馬6</option>
                <option value="練馬7" data-val="練馬" @if (old('dan_name') == '練馬7') selected @endif>練馬7</option>
                <option value="練馬8" data-val="練馬" @if (old('dan_name') == '練馬8') selected @endif>練馬8</option>
                <option value="練馬9" data-val="練馬" @if (old('dan_name') == '練馬9') selected @endif>練馬9</option>
                <option value="練馬10" data-val="練馬" @if (old('dan_name') == '練馬10') selected @endif>練馬10</option>
                <option value="練馬13" data-val="練馬" @if (old('dan_name') == '練馬13') selected @endif>練馬13</option>
                <option value="練馬15" data-val="練馬" @if (old('dan_name') == '練馬15') selected @endif>練馬15</option>
                <option value="練馬16" data-val="練馬" @if (old('dan_name') == '練馬16') selected @endif>練馬16</option>
                <option value="練馬17" data-val="練馬" @if (old('dan_name') == '練馬17') selected @endif>練馬17</option>
                <option value="青梅2" data-val="多摩西" @if (old('dan_name') == '青梅2') selected @endif>青梅2</option>
                <option value="青梅4" data-val="多摩西" @if (old('dan_name') == '青梅4') selected @endif>青梅4</option>
                <option value="福生1" data-val="多摩西" @if (old('dan_name') == '福生1') selected @endif>福生1</option>
                <option value="福生2" data-val="多摩西" @if (old('dan_name') == '福生2') selected @endif>福生2</option>
                <option value="あきる野1" data-val="多摩西" @if (old('dan_name') == 'あきる野1') selected @endif>あきる野1</option>
                <option value="瑞穂1" data-val="多摩西" @if (old('dan_name') == '瑞穂1') selected @endif>瑞穂1</option>
                <option value="羽村1" data-val="多摩西" @if (old('dan_name') == '羽村1') selected @endif>羽村1</option>
                <option value="八王子1" data-val="多摩西" @if (old('dan_name') == '八王子1') selected @endif>八王子1</option>
                <option value="八王子2" data-val="多摩西" @if (old('dan_name') == '八王子2') selected @endif>八王子2</option>
                <option value="八王子5" data-val="多摩西" @if (old('dan_name') == '八王子5') selected @endif>八王子5</option>
                <option value="八王子6" data-val="多摩西" @if (old('dan_name') == '八王子6') selected @endif>八王子6</option>
                <option value="八王子7" data-val="多摩西" @if (old('dan_name') == '八王子7') selected @endif>八王子7</option>
                <option value="八王子11" data-val="多摩西" @if (old('dan_name') == '八王子11') selected @endif>八王子11</option>
                <option value="八王子12" data-val="多摩西" @if (old('dan_name') == '八王子12') selected @endif>八王子12</option>
                <option value="八王子13" data-val="多摩西" @if (old('dan_name') == '八王子13') selected @endif>八王子13</option>
                <option value="立川3" data-val="新多磨" @if (old('dan_name') == '立川3') selected @endif>立川3</option>
                <option value="立川4" data-val="新多磨" @if (old('dan_name') == '立川4') selected @endif>立川4</option>
                <option value="立川6" data-val="新多磨" @if (old('dan_name') == '立川6') selected @endif>立川6</option>
                <option value="立川10" data-val="新多磨" @if (old('dan_name') == '立川10') selected @endif>立川10</option>
                <option value="国立1" data-val="新多磨" @if (old('dan_name') == '国立1') selected @endif>国立1</option>
                <option value="国立2" data-val="新多磨" @if (old('dan_name') == '国立2') selected @endif>国立2</option>
                <option value="昭島1" data-val="新多磨" @if (old('dan_name') == '昭島1') selected @endif>昭島1</option>
                <option value="日野2" data-val="新多磨" @if (old('dan_name') == '日野2') selected @endif>日野2</option>
                <option value="日野4" data-val="新多磨" @if (old('dan_name') == '日野4') selected @endif>日野4</option>
                <option value="多摩1" data-val="新多磨" @if (old('dan_name') == '多摩1') selected @endif>多摩1</option>
                <option value="多摩3" data-val="新多磨" @if (old('dan_name') == '多摩3') selected @endif>多摩3</option>
                <option value="稲城1" data-val="新多磨" @if (old('dan_name') == '稲城1') selected @endif>稲城1</option>
                <option value="武蔵野1" data-val="南武蔵野" @if (old('dan_name') == '武蔵野1') selected @endif>武蔵野1</option>
                <option value="三鷹1" data-val="南武蔵野" @if (old('dan_name') == '三鷹1') selected @endif>三鷹1</option>
                <option value="三鷹2" data-val="南武蔵野" @if (old('dan_name') == '三鷹2') selected @endif>三鷹2</option>
                <option value="三鷹3" data-val="南武蔵野" @if (old('dan_name') == '三鷹3') selected @endif>三鷹3</option>
                <option value="小金井1" data-val="南武蔵野" @if (old('dan_name') == '小金井1') selected @endif>小金井1</option>
                <option value="小金井2" data-val="南武蔵野" @if (old('dan_name') == '小金井2') selected @endif>小金井2</option>
                <option value="小金井4" data-val="南武蔵野" @if (old('dan_name') == '小金井4') selected @endif>小金井4</option>
                <option value="国分寺1" data-val="南武蔵野" @if (old('dan_name') == '国分寺1') selected @endif>国分寺1</option>
                <option value="国分寺2" data-val="南武蔵野" @if (old('dan_name') == '国分寺2') selected @endif>国分寺2</option>
                <option value="調布2" data-val="南武蔵野" @if (old('dan_name') == '調布2') selected @endif>調布2</option>
                <option value="調布3" data-val="南武蔵野" @if (old('dan_name') == '調布3') selected @endif>調布3</option>
                <option value="調布6" data-val="南武蔵野" @if (old('dan_name') == '調布6') selected @endif>調布6</option>
                <option value="調布9" data-val="南武蔵野" @if (old('dan_name') == '調布9') selected @endif>調布9</option>
                <option value="調布10" data-val="南武蔵野" @if (old('dan_name') == '調布10') selected @endif>調布10</option>
                <option value="狛江1" data-val="南武蔵野" @if (old('dan_name') == '狛江1') selected @endif>狛江1</option>
                <option value="狛江3" data-val="南武蔵野" @if (old('dan_name') == '狛江3') selected @endif>狛江3</option>
                <option value="狛江5" data-val="南武蔵野" @if (old('dan_name') == '狛江5') selected @endif>狛江5</option>
                <option value="府中1" data-val="南武蔵野" @if (old('dan_name') == '府中1') selected @endif>府中1</option>
                <option value="府中2" data-val="南武蔵野" @if (old('dan_name') == '府中2') selected @endif>府中2</option>
                <option value="府中6" data-val="南武蔵野" @if (old('dan_name') == '府中6') selected @endif>府中6</option>
                <option value="町田1" data-val="町田" @if (old('dan_name') == '町田1') selected @endif>町田1</option>
                <option value="町田3" data-val="町田" @if (old('dan_name') == '町田3') selected @endif>町田3</option>
                <option value="町田6" data-val="町田" @if (old('dan_name') == '町田6') selected @endif>町田6</option>
                <option value="町田9" data-val="町田" @if (old('dan_name') == '町田9') selected @endif>町田9</option>
                <option value="町田13" data-val="町田" @if (old('dan_name') == '町田13') selected @endif>町田13</option>
                <option value="町田15" data-val="町田" @if (old('dan_name') == '町田15') selected @endif>町田15</option>
                <option value="町田16" data-val="町田" @if (old('dan_name') == '町田16') selected @endif>町田16</option>
                <option value="町田18" data-val="町田" @if (old('dan_name') == '町田18') selected @endif>町田18</option>
                <option value="町田20" data-val="町田" @if (old('dan_name') == '町田20') selected @endif>町田20</option>
                <option value="東大和1" data-val="北多摩" @if (old('dan_name') == '東大和1') selected @endif>東大和1</option>
                <option value="東大和2" data-val="北多摩" @if (old('dan_name') == '東大和2') selected @endif>東大和2</option>
                <option value="東村山6" data-val="北多摩" @if (old('dan_name') == '東村山6') selected @endif>東村山6</option>
                <option value="小平1" data-val="北多摩" @if (old('dan_name') == '小平1') selected @endif>小平1</option>
                <option value="小平2" data-val="北多摩" @if (old('dan_name') == '小平2') selected @endif>小平2</option>
                <option value="小平3" data-val="北多摩" @if (old('dan_name') == '小平3') selected @endif>小平3</option>
                <option value="小平4" data-val="北多摩" @if (old('dan_name') == '小平4') selected @endif>小平4</option>
                <option value="小平5" data-val="北多摩" @if (old('dan_name') == '小平5') selected @endif>小平5</option>
                <option value="清瀬2" data-val="北多摩" @if (old('dan_name') == '清瀬2') selected @endif>清瀬2</option>
                <option value="東久留米1" data-val="北多摩" @if (old('dan_name') == '東久留米1') selected @endif>東久留米1</option>
                <option value="東久留米2" data-val="北多摩" @if (old('dan_name') == '東久留米2') selected @endif>東久留米2</option>
                <option value="西東京1" data-val="北多摩" @if (old('dan_name') == '西東京1') selected @endif>西東京1</option>
                <option value="西東京2" data-val="北多摩" @if (old('dan_name') == '西東京2') selected @endif>西東京2</option>
            </select>
        </div>
        @error('dan_name')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="w-100"></div>


<div class="card col-sm-6">
    <div class="card-header">
        緊急連絡先
    </div>
    <div class="card-body">
        <!-- Parent Name Field -->
        <div class="form-group">
            {!! Form::label('parent_name', '保護者氏名:') !!}
            {!! Form::text('parent_name', null, ['class' => 'form-control']) !!}
            @error('parent_name')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Parent Name Furigana Field -->
        <div class="form-group">
            {!! Form::label('parent_name_furigana', '保護者ふりがな:') !!}
            {!! Form::text('parent_name_furigana', null, ['class' => 'form-control']) !!}
            @error('parent_name_furigana')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Parent Relation Field -->
        <div class="form-group">
            {!! Form::label('parent_relation', '保護者続柄:') !!}
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
        隊の承認
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
            {!! Form::select('sm_position', ['' => '', 'RS隊長' => 'RS隊長', '団委員長' => '団委員長'], null, ['class' => 'form-control custom-select']) !!}
            @error('sm_position')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>
