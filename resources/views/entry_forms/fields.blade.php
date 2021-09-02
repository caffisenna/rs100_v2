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
            {!! Form::text('furigana', null, ['class' => 'form-control','placeholder'=>'ふりがな']) !!}
        </div>

        <!-- Birth Day Field -->
        <div class="form-group">
            {!! Form::label('birth_day', '生年月日:') !!}
            {!! Form::text('birth_day', null, ['class' => 'form-control', 'id' => 'birth_day','placeholder'=>'2021-01-23の形式']) !!}
        </div>

        @push('page_scripts')
            <script type="text/javascript">
                $('#birth_day').datepicker({
                    format: 'yyyy-mm-dd',
                    useCurrent: true,
                    sideBySide: true,
                    language: 'ja',
                    autoclose: true
                })
            </script>
        @endpush

        <!-- Gender Field -->
        <div class="form-group">
            {!! Form::label('gender', '性別:') !!}
            {!! Form::select('gender', [''=>'','男' => '男', '女' => '女'], null, ['class' => 'form-control custom-select']) !!}
        </div>


        <!-- Zip Field -->
        <div class="form-group">
            {!! Form::label('zip', '郵便番号:') !!}
            {!! Form::text('zip', null, ['class' => 'form-control', 'placeholder' => '1600000', 'maxlength' => '7', 'required' => 'required']) !!}
        </div>

        <!-- Address Field -->
        <div class="form-group">
            {!! Form::label('address', '住所:') !!}
            {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'番地まで正確に']) !!}
        </div>

        <!-- Telephone Field -->
        <div class="form-group">
            {!! Form::label('telephone', '電話番号(自宅):') !!}
            {!! Form::text('telephone', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>

        <!-- Cellphone Field -->
        <div class="form-group">
            {!! Form::label('cellphone', 'ケータイ番号:') !!}
            {!! Form::text('cellphone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '08012345678(ハイク中連絡がとれるもの)']) !!}
        </div>

        <!-- 50Km Exp Field -->
        <div class="form-group">
            {!! Form::label('exp_50km_exp', '50kmハイクの経験:') !!}
            {!! Form::select('exp_50km', ['' => '', 'あり' => 'あり', 'なし' => 'なし'], null, ['class' => 'form-control custom-select', 'required' => 'required']) !!}
        </div>

    </div>
</div>


<div class="card col-sm-6">
    <div class="card-header">
        所属
    </div>
    <div class="card-body">
        <!-- Bs Id Field -->
        <div class="form-group">
            {!! Form::label('bs_id', '登録番号:') !!}
            {!! Form::text('bs_id', null, ['class' => 'form-control','placeholder'=>'登録証で確認']) !!}
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
        </div>


        <!-- Dan Name Field -->
        <div class="form-group">
            {!! Form::label('dan_name', '団名:') !!}
            <select class="children form-control" name="dan_name" disabled>
                <option value="" selected="selected">団を選択</option>
                <option value="千代田1" data-val="大都心">千代田1</option>
                <option value="千代田6" data-val="大都心">千代田6</option>
                <option value="千代田7" data-val="大都心">千代田7</option>
                <option value="千代田8" data-val="大都心">千代田8</option>
                <option value="千代田9" data-val="大都心">千代田9</option>
                <option value="千代田10" data-val="大都心">千代田10</option>
                <option value="千代田11" data-val="大都心">千代田11</option>
                <option value="中央5" data-val="大都心">中央5</option>
                <option value="中央6" data-val="大都心">中央6</option>
                <option value="中央7" data-val="大都心">中央7</option>
                <option value="中央10" data-val="大都心">中央10</option>
                <option value="中央11" data-val="大都心">中央11</option>
                <option value="港1" data-val="大都心">港1</option>
                <option value="港3" data-val="大都心">港3</option>
                <option value="港5" data-val="大都心">港5</option>
                <option value="港12" data-val="大都心">港12</option>
                <option value="港14" data-val="大都心">港14</option>
                <option value="港15" data-val="大都心">港15</option>
                <option value="港16" data-val="大都心">港16</option>
                <option value="港18" data-val="大都心">港18</option>
                <option value="新宿1" data-val="大都心">新宿1</option>
                <option value="新宿2" data-val="大都心">新宿2</option>
                <option value="新宿4" data-val="大都心">新宿4</option>
                <option value="新宿8" data-val="大都心">新宿8</option>
                <option value="新宿9" data-val="大都心">新宿9</option>
                <option value="新宿17" data-val="大都心">新宿17</option>
                <option value="新宿18" data-val="大都心">新宿18</option>
                <option value="台東1" data-val="さくら">台東1</option>
                <option value="台東2" data-val="さくら">台東2</option>
                <option value="台東3" data-val="さくら">台東3</option>
                <option value="台東4" data-val="さくら">台東4</option>
                <option value="台東7" data-val="さくら">台東7</option>
                <option value="文京1" data-val="さくら">文京1</option>
                <option value="文京2" data-val="さくら">文京2</option>
                <option value="文京3" data-val="さくら">文京3</option>
                <option value="文京5" data-val="さくら">文京5</option>
                <option value="文京6" data-val="さくら">文京6</option>
                <option value="荒川1" data-val="さくら">荒川1</option>
                <option value="荒川2" data-val="さくら">荒川2</option>
                <option value="荒川6" data-val="さくら">荒川6</option>
                <option value="足立3" data-val="さくら">足立3</option>
                <option value="足立4" data-val="さくら">足立4</option>
                <option value="足立5" data-val="さくら">足立5</option>
                <option value="足立14" data-val="さくら">足立14</option>
                <option value="江戸川1" data-val="城東">江戸川1</option>
                <option value="江戸川2" data-val="城東">江戸川2</option>
                <option value="江戸川3" data-val="城東">江戸川3</option>
                <option value="江戸川5" data-val="城東">江戸川5</option>
                <option value="江戸川7" data-val="城東">江戸川7</option>
                <option value="葛飾2" data-val="城東">葛飾2</option>
                <option value="葛飾3" data-val="城東">葛飾3</option>
                <option value="葛飾4" data-val="城東">葛飾4</option>
                <option value="葛飾5" data-val="城東">葛飾5</option>
                <option value="葛飾9" data-val="城東">葛飾9</option>
                <option value="江東2" data-val="城東">江東2</option>
                <option value="江東3" data-val="城東">江東3</option>
                <option value="江東6" data-val="城東">江東6</option>
                <option value="墨田3" data-val="城東">墨田3</option>
                <option value="墨田4" data-val="城東">墨田4</option>
                <option value="墨田8" data-val="城東">墨田8</option>
                <option value="墨田9" data-val="城東">墨田9</option>
                <option value="目黒1" data-val="山手">目黒1</option>
                <option value="目黒3" data-val="山手">目黒3</option>
                <option value="目黒6" data-val="山手">目黒6</option>
                <option value="目黒7" data-val="山手">目黒7</option>
                <option value="目黒8" data-val="山手">目黒8</option>
                <option value="目黒9" data-val="山手">目黒9</option>
                <option value="目黒15" data-val="山手">目黒15</option>
                <option value="渋谷2" data-val="山手">渋谷2</option>
                <option value="渋谷5" data-val="山手">渋谷5</option>
                <option value="渋谷6" data-val="山手">渋谷6</option>
                <option value="渋谷9" data-val="山手">渋谷9</option>
                <option value="渋谷10" data-val="山手">渋谷10</option>
                <option value="渋谷14" data-val="山手">渋谷14</option>
                <option value="品川1" data-val="つばさ">品川1</option>
                <option value="品川2" data-val="つばさ">品川2</option>
                <option value="品川6" data-val="つばさ">品川6</option>
                <option value="品川8" data-val="つばさ">品川8</option>
                <option value="大田1" data-val="つばさ">大田1</option>
                <option value="大田2" data-val="つばさ">大田2</option>
                <option value="大田3" data-val="つばさ">大田3</option>
                <option value="大田4" data-val="つばさ">大田4</option>
                <option value="大田6" data-val="つばさ">大田6</option>
                <option value="大田7" data-val="つばさ">大田7</option>
                <option value="大田11" data-val="つばさ">大田11</option>
                <option value="大田14" data-val="つばさ">大田14</option>
                <option value="大田15" data-val="つばさ">大田15</option>
                <option value="大田17" data-val="つばさ">大田17</option>
                <option value="大田18" data-val="つばさ">大田18</option>
                <option value="大田19" data-val="つばさ">大田19</option>
                <option value="世田谷1" data-val="世田谷">世田谷1</option>
                <option value="世田谷2" data-val="世田谷">世田谷2</option>
                <option value="世田谷3" data-val="世田谷">世田谷3</option>
                <option value="世田谷4" data-val="世田谷">世田谷4</option>
                <option value="世田谷5" data-val="世田谷">世田谷5</option>
                <option value="世田谷6" data-val="世田谷">世田谷6</option>
                <option value="世田谷7" data-val="世田谷">世田谷7</option>
                <option value="世田谷8" data-val="世田谷">世田谷8</option>
                <option value="世田谷9" data-val="世田谷">世田谷9</option>
                <option value="世田谷10" data-val="世田谷">世田谷10</option>
                <option value="世田谷11" data-val="世田谷">世田谷11</option>
                <option value="世田谷12" data-val="世田谷">世田谷12</option>
                <option value="世田谷14" data-val="世田谷">世田谷14</option>
                <option value="世田谷15" data-val="世田谷">世田谷15</option>
                <option value="世田谷16" data-val="世田谷">世田谷16</option>
                <option value="世田谷19" data-val="世田谷">世田谷19</option>
                <option value="世田谷20" data-val="世田谷">世田谷20</option>
                <option value="世田谷22" data-val="世田谷">世田谷22</option>
                <option value="世田谷23" data-val="世田谷">世田谷23</option>
                <option value="世田谷24" data-val="世田谷">世田谷24</option>
                <option value="世田谷25" data-val="世田谷">世田谷25</option>
                <option value="中野3" data-val="あすなろ">中野3</option>
                <option value="中野5" data-val="あすなろ">中野5</option>
                <option value="中野8" data-val="あすなろ">中野8</option>
                <option value="中野11" data-val="あすなろ">中野11</option>
                <option value="杉並2" data-val="あすなろ">杉並2</option>
                <option value="杉並3" data-val="あすなろ">杉並3</option>
                <option value="杉並4" data-val="あすなろ">杉並4</option>
                <option value="杉並5" data-val="あすなろ">杉並5</option>
                <option value="杉並6" data-val="あすなろ">杉並6</option>
                <option value="杉並9" data-val="あすなろ">杉並9</option>
                <option value="杉並11" data-val="あすなろ">杉並11</option>
                <option value="杉並12" data-val="あすなろ">杉並12</option>
                <option value="杉並13" data-val="あすなろ">杉並13</option>
                <option value="豊島1" data-val="城北">豊島1</option>
                <option value="豊島4" data-val="城北">豊島4</option>
                <option value="豊島6" data-val="城北">豊島6</option>
                <option value="豊島7" data-val="城北">豊島7</option>
                <option value="豊島8" data-val="城北">豊島8</option>
                <option value="豊島9" data-val="城北">豊島9</option>
                <option value="豊島17" data-val="城北">豊島17</option>
                <option value="北1" data-val="城北">北1</option>
                <option value="北3" data-val="城北">北3</option>
                <option value="北5" data-val="城北">北5</option>
                <option value="北8" data-val="城北">北8</option>
                <option value="北11" data-val="城北">北11</option>
                <option value="板橋2" data-val="城北">板橋2</option>
                <option value="板橋3" data-val="城北">板橋3</option>
                <option value="板橋4" data-val="城北">板橋4</option>
                <option value="板橋5" data-val="城北">板橋5</option>
                <option value="板橋7" data-val="城北">板橋7</option>
                <option value="板橋9" data-val="城北">板橋9</option>
                <option value="板橋10" data-val="城北">板橋10</option>
                <option value="板橋11" data-val="城北">板橋11</option>
                <option value="板橋15" data-val="城北">板橋15</option>
                <option value="練馬1" data-val="練馬">練馬1</option>
                <option value="練馬3" data-val="練馬">練馬3</option>
                <option value="練馬4" data-val="練馬">練馬4</option>
                <option value="練馬5" data-val="練馬">練馬5</option>
                <option value="練馬6" data-val="練馬">練馬6</option>
                <option value="練馬7" data-val="練馬">練馬7</option>
                <option value="練馬8" data-val="練馬">練馬8</option>
                <option value="練馬9" data-val="練馬">練馬9</option>
                <option value="練馬10" data-val="練馬">練馬10</option>
                <option value="練馬13" data-val="練馬">練馬13</option>
                <option value="練馬15" data-val="練馬">練馬15</option>
                <option value="練馬16" data-val="練馬">練馬16</option>
                <option value="練馬17" data-val="練馬">練馬17</option>
                <option value="青梅2" data-val="多摩西">青梅2</option>
                <option value="青梅4" data-val="多摩西">青梅4</option>
                <option value="福生1" data-val="多摩西">福生1</option>
                <option value="福生2" data-val="多摩西">福生2</option>
                <option value="あきる野1" data-val="多摩西">あきる野1</option>
                <option value="瑞穂1" data-val="多摩西">瑞穂1</option>
                <option value="羽村1" data-val="多摩西">羽村1</option>
                <option value="八王子1" data-val="多摩西">八王子1</option>
                <option value="八王子2" data-val="多摩西">八王子2</option>
                <option value="八王子5" data-val="多摩西">八王子5</option>
                <option value="八王子6" data-val="多摩西">八王子6</option>
                <option value="八王子7" data-val="多摩西">八王子7</option>
                <option value="八王子11" data-val="多摩西">八王子11</option>
                <option value="八王子12" data-val="多摩西">八王子12</option>
                <option value="八王子13" data-val="多摩西">八王子13</option>
                <option value="立川3" data-val="新多磨">立川3</option>
                <option value="立川4" data-val="新多磨">立川4</option>
                <option value="立川6" data-val="新多磨">立川6</option>
                <option value="立川10" data-val="新多磨">立川10</option>
                <option value="国立1" data-val="新多磨">国立1</option>
                <option value="国立2" data-val="新多磨">国立2</option>
                <option value="昭島1" data-val="新多磨">昭島1</option>
                <option value="日野2" data-val="新多磨">日野2</option>
                <option value="日野4" data-val="新多磨">日野4</option>
                <option value="多摩1" data-val="新多磨">多摩1</option>
                <option value="多摩3" data-val="新多磨">多摩3</option>
                <option value="稲城1" data-val="新多磨">稲城1</option>
                <option value="武蔵野1" data-val="南武蔵野">武蔵野1</option>
                <option value="三鷹1" data-val="南武蔵野">三鷹1</option>
                <option value="三鷹2" data-val="南武蔵野">三鷹2</option>
                <option value="三鷹3" data-val="南武蔵野">三鷹3</option>
                <option value="小金井1" data-val="南武蔵野">小金井1</option>
                <option value="小金井2" data-val="南武蔵野">小金井2</option>
                <option value="小金井4" data-val="南武蔵野">小金井4</option>
                <option value="国分寺1" data-val="南武蔵野">国分寺1</option>
                <option value="国分寺2" data-val="南武蔵野">国分寺2</option>
                <option value="調布2" data-val="南武蔵野">調布2</option>
                <option value="調布3" data-val="南武蔵野">調布3</option>
                <option value="調布6" data-val="南武蔵野">調布6</option>
                <option value="調布9" data-val="南武蔵野">調布9</option>
                <option value="調布10" data-val="南武蔵野">調布10</option>
                <option value="狛江1" data-val="南武蔵野">狛江1</option>
                <option value="狛江3" data-val="南武蔵野">狛江3</option>
                <option value="狛江5" data-val="南武蔵野">狛江5</option>
                <option value="府中1" data-val="南武蔵野">府中1</option>
                <option value="府中2" data-val="南武蔵野">府中2</option>
                <option value="府中6" data-val="南武蔵野">府中6</option>
                <option value="町田1" data-val="町田">町田1</option>
                <option value="町田3" data-val="町田">町田3</option>
                <option value="町田6" data-val="町田">町田6</option>
                <option value="町田9" data-val="町田">町田9</option>
                <option value="町田13" data-val="町田">町田13</option>
                <option value="町田15" data-val="町田">町田15</option>
                <option value="町田16" data-val="町田">町田16</option>
                <option value="町田18" data-val="町田">町田18</option>
                <option value="町田20" data-val="町田">町田20</option>
                <option value="東大和1" data-val="北多摩">東大和1</option>
                <option value="東大和2" data-val="北多摩">東大和2</option>
                <option value="東村山6" data-val="北多摩">東村山6</option>
                <option value="小平1" data-val="北多摩">小平1</option>
                <option value="小平2" data-val="北多摩">小平2</option>
                <option value="小平3" data-val="北多摩">小平3</option>
                <option value="小平4" data-val="北多摩">小平4</option>
                <option value="小平5" data-val="北多摩">小平5</option>
                <option value="清瀬2" data-val="北多摩">清瀬2</option>
                <option value="東久留米1" data-val="北多摩">東久留米1</option>
                <option value="東久留米2" data-val="北多摩">東久留米2</option>
                <option value="西東京1" data-val="北多摩">西東京1</option>
                <option value="西東京2" data-val="北多摩">西東京2</option>
            </select>
        </div>

    </div>
</div>





<div class="card col-sm-6">
    <div class="card-header">
        緊急連絡先
    </div>
    <div class="card-body">
        <!-- Parent Name Field -->
        <div class="form-group">
            {!! Form::label('parent_name', '保護者氏名:') !!}
            {!! Form::text('parent_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>

        <!-- Parent Name Furigana Field -->
        <div class="form-group">
            {!! Form::label('parent_name_furigana', '保護者ふりがな:') !!}
            {!! Form::text('parent_name_furigana', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>

        <!-- Parent Relation Field -->
        <div class="form-group">
            {!! Form::label('parent_relation', '保護者続柄:') !!}
            {!! Form::text('parent_relation', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '父、母など']) !!}
        </div>

        <!-- Emer Phone Field -->
        <div class="form-group">
            {!! Form::label('emer_phone', '緊急連絡先電話番号:') !!}
            {!! Form::text('emer_phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>

<div class="card col-sm-6">
    <div class="card-header">
        隊の承認
    </div>
    <div class="card-body">
        <!-- Sm Name Field -->
        <div class="form-group">
            {!! Form::label('sm_name', '隊長もしくは団委員長氏名:') !!}
            {!! Form::text('sm_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>

        <!-- Sm Position Field -->
        <div class="form-group">
            {!! Form::label('sm_position', '役務:') !!}
            {!! Form::select('sm_position', ['' => '', 'RS隊長' => 'RS隊長', '団委員長' => '団委員長'], null, ['class' => 'form-control custom-select', 'required' => 'required']) !!}
        </div>

    </div>
</div>
