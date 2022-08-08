<div class="grid-x grid-padding-x">
    <div class="cell medium-3">
        {{ Form::label('material', 'جنس') }}
        <select name="material_id">
            <option value="NULL">هیچ کدام</option>
            @foreach($material as $item)
                <option value='{{ $item->id }}'>{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="cell medium-3">
        {{ Form::label('weight', 'وزن') }}
        {{ Form::number('weight', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('numberin', 'تعداد در بسته') }}
        {{ Form::number('numberin', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('expire_at', 'تاریخ انقضا') }}
        {{ Form::date('expire_at', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('days', 'مدت زمان آماده سازی') }}
        {{ Form::number('days', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('teamstar', 'امتیاز تیم سلامت‌لاین') }}
        {{ Form::number('teamstar', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('length', 'طول') }}
        {{ Form::number('length', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('width', 'عرض') }}
        {{ Form::number('width', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('height', 'ارتفاع') }}
        {{ Form::number('height', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('diameter', 'قطر') }}
        {{ Form::number('diameter', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('volume', 'حجم') }}
        {{ Form::number('volume', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('purity', 'درصد خلوص') }}
        {{ Form::number('purity', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('density', 'گرماژ') }}
        {{ Form::number('density', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('company_id', 'شرکت واردکننده/گارانتی/سازنده') }}
        <select name="company_id">
            <option value="NULL">هیچ کدام</option>
            @foreach($company as $item)
                <option value='{{ $item->id }}'>{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="cell medium-3">
        {{ Form::label('guarantee', 'مدت گارانتی') }}
        {{ Form::number('guarantee', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('warranty', 'مدت وارانتی') }}
        {{ Form::number('warranty', null) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('kind', 'نوع') }}
        {{ Form::select('kind', ['sterile' => 'استریل', 'nonsterile' => 'غیر استریل'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('mechanism', 'مکانیزم') }}
        {{ Form::select('mechanism', ['mechanical' => 'مکانیکی', 'electrical' => 'برقی', 'charging' => 'شارژی', 'battery' => 'باتری', 'elec-batt' => 'برق/باتری'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('operation', 'کارکرد') }}
        {{ Form::select('operation', ['automatic' => 'اتوماتیک', 'semiauto' => 'نیمه اتوماتیک', 'nonautomatic' => 'غیراتوماتیک'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('transport', 'حمل و نقل') }}
        {{ Form::select('transport', ['huge' => 'خیلی بزرگ', 'big' => 'بزرگ', 'medium' => 'متوسط', 'small' => 'کوچک'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
    </div>
</div>