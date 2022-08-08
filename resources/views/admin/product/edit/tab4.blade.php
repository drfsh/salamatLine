<div class="grid-x grid-padding-x">
    <div class="cell medium-3">
        {{ Form::label('material', 'جنس') }}
        <select name="material_id">
            <option value="NULL">هیچ کدام</option>
            @foreach($material as $item)
                <option value='{{ $item->id }}' {{$product->feature->material_id==$item->id ? 'selected' : ''}}>{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="cell medium-3">
        {{ Form::label('weight', 'وزن') }}
        {{ Form::number('weight', $product->feature->getAttributes()['weight']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('numberin', 'تعداد در بسته') }}
        {{ Form::number('numberin', $product->feature->numberin) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('expire_at', 'تاریخ انقضا') }}
        {{ Form::date('expire_at', $product->feature->expire_at) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('days', 'مدت زمان آماده سازی') }}
        {{ Form::number('days', $product->feature->days) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('teamstar', 'امتیاز تیم سلامت‌لاین') }}
        {{ Form::number('teamstar', $product->feature->teamstar) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('length', 'طول') }}
        {{ Form::number('length', $product->feature->getAttributes()['length']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('width', 'عرض') }}
        {{ Form::number('width', $product->feature->getAttributes()['width']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('height', 'ارتفاع') }}
        {{ Form::number('height', $product->feature->getAttributes()['height']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('diameter', 'قطر') }}
        {{ Form::number('diameter', $product->feature->getAttributes()['diameter']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('volume', 'حجم') }}
        {{ Form::number('volume', $product->feature->getAttributes()['volume']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('purity', 'درصد خلوص') }}
        {{ Form::number('purity', $product->feature->purity) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('density', 'گرماژ') }}
        {{ Form::number('density', $product->feature->density) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('company_id', 'شرکت واردکننده/گارانتی/سازنده') }}
        <select name="company_id">
            <option value="NULL">هیچ کدام</option>
            @foreach($company as $item)
                <option value='{{ $item->id }}' {{$product->feature->company_id==$item->id ? 'selected' : ''}}>{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="cell medium-3">
        {{ Form::label('guarantee', 'مدت گارانتی') }}
        {{ Form::number('guarantee', $product->feature->getAttributes()['guarantee']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('warranty', 'مدت وارانتی') }}
        {{ Form::number('warranty', $product->feature->getAttributes()['warranty']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('kind', 'نوع') }}
        {{ Form::select('kind', ['sterile' => 'استریل', 'nonsterile' => 'غیر استریل'], $product->feature->getAttributes()['kind'], ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('mechanism', 'مکانیزم') }}
        {{ Form::select('mechanism', ['mechanical' => 'مکانیکی', 'electrical' => 'برقی', 'charging' => 'شارژی', 'hand' => 'دستی', 'battery' => 'باتری', 'elec-batt' => 'برق/باتری'], $product->feature->getAttributes()['mechanism'], ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('operation', 'کارکرد') }}
        {{ Form::select('operation', ['automatic' => 'اتوماتیک', 'semiauto' => 'نیمه اتوماتیک', 'nonautomatic' => 'غیراتوماتیک'], $product->feature->getAttributes()['operation'], ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
    </div>
    <div class="cell medium-3">
        {{ Form::label('transport', 'حمل و نقل') }}
        {{ Form::select('transport', ['huge' => 'خیلی بزرگ', 'big' => 'بزرگ', 'medium' => 'متوسط', 'small' => 'کوچک'], $product->feature->getAttributes()['transport'], ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
    </div>
</div>