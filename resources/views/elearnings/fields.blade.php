<script type="text/javascript">
    function shuffleContent(container) {
        var content = container.find("> *");
        var total = content.length;
        content.each(function() {
            content.eq(Math.floor(Math.random() * total)).prependTo(container);
        });
    }
    $(function() {
        shuffleContent($(".item_wrapper"));
    });
</script>

<div class="item_wrapper">
    <div class="item">
        <!-- Q1 Field -->
        <div class="form-group col-sm-12 @if ($errors->has('q1')) has-error @endif">
            {!! Form::label('q1', 'Q1 好きなデバイスは?', ['class' => 'form-check-label']) !!}
            <label class="form-check">
                {!! Form::radio('q1', '1', null, ['class' => 'form-check-input']) !!} mac
            </label>

            <label class="form-check">
                {!! Form::radio('q1', '2', null, ['class' => 'form-check-input']) !!} iPhone
            </label>

            <label class="form-check">
                {!! Form::radio('q1', '3', null, ['class' => 'form-check-input']) !!} iPad
            </label>

        </div>
    </div>

    <div class="item">
        <!-- Q2 Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('q2', 'Q2 好きな食べ物は?', ['class' => 'form-check-label']) !!}
            <label class="form-check">
                {!! Form::radio('q2', '1', null, ['class' => 'form-check-input']) !!} 牛丼
            </label>

            <label class="form-check">
                {!! Form::radio('q2', '2', null, ['class' => 'form-check-input']) !!} カレー
            </label>

            <label class="form-check">
                {!! Form::radio('q2', '3', null, ['class' => 'form-check-input']) !!} 酢豚
            </label>

        </div>
    </div>

    <div class="item">
        <!-- Q3 Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('q3', 'Q3 好きなコンビニは?', ['class' => 'form-check-label']) !!}
            <label class="form-check">
                {!! Form::radio('q3', '1', null, ['class' => 'form-check-input']) !!} 7/11
            </label>

            <label class="form-check">
                {!! Form::radio('q3', '2', null, ['class' => 'form-check-input']) !!} ファミマ
            </label>

            <label class="form-check">
                {!! Form::radio('q3', '3', null, ['class' => 'form-check-input']) !!} ローソン
            </label>

        </div>
    </div>

    <div class="item">
        <!-- Q4 Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('q4', 'Q4 好きなキャンプ場は?', ['class' => 'form-check-label']) !!}
            <label class="form-check">
                {!! Form::radio('q4', '1', null, ['class' => 'form-check-input']) !!} ひよどり山キャンプ場
            </label>

            <label class="form-check">
                {!! Form::radio('q4', '2', null, ['class' => 'form-check-input']) !!} 日向野営場
            </label>

            <label class="form-check">
                {!! Form::radio('q4', '3', null, ['class' => 'form-check-input']) !!} 平和島キャンプ場
            </label>

        </div>
    </div>
</div>
