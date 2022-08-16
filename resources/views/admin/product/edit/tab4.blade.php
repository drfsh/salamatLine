<div class="grid-x grid-padding-x checkbox-non-m">
    <div class="cell medium-3">
        {{ Form::label('material', 'جنس') }}
        <div class="d-flex">

            <select id="material_id" name="material_id">
                <option value="NULL">هیچ کدام</option>
                @foreach($material as $item)
                    <option value='{{ $item->id }}' {{$product->feature->material_id==$item->id ? 'selected' : ''}}>{{ $item->title }}</option>
                @endforeach
            </select>

            <label class="check-label">
                {{ Form::checkbox('is_material_id','true',$product->feature->getAttributes()['is_material_id'],['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('weight', 'وزن') }}
        <div class="d-flex">
        {{ Form::number('weight', $product->feature->getAttributes()['weight']) }}
            <label class="check-label">
                {{ Form::checkbox('is_weight','true',$product->feature->getAttributes()['is_weight'],['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('numberin', 'تعداد در بسته') }}
        <div class="d-flex">
        {{ Form::number('numberin', $product->feature->numberin) }}

            <label class="check-label">
                {{ Form::checkbox('is_numberin','true',$product->feature->getAttributes()['is_numberin'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('expire_at', 'تاریخ انقضا') }}
        <div class="d-flex">
        {{ Form::date('expire_at', $product->feature->expire_at) }}

            <label class="check-label">
                {{ Form::checkbox('is_expire_at','true',$product->feature->getAttributes()['is_expire_at'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('days', 'مدت زمان آماده سازی') }}
        <div class="d-flex">
        {{ Form::number('days', $product->feature->days) }}

            <label class="check-label">
                {{ Form::checkbox('is_days','true',$product->feature->getAttributes()['is_days'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('teamstar', 'امتیاز تیم سلامت‌لاین') }}
        <div class="d-flex">
        {{ Form::number('teamstar', $product->feature->teamstar) }}

            <label class="check-label">
                {{ Form::checkbox('is_teamstar','true',$product->feature->getAttributes()['is_teamstar'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('length', 'طول') }}
        <div class="d-flex">
        {{ Form::number('length', $product->feature->getAttributes()['length']) }}

            <label class="check-label">
                {{ Form::checkbox('is_length','true',$product->feature->getAttributes()['is_length'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('width', 'عرض') }}
        <div class="d-flex">
            {{ Form::number('width', $product->feature->getAttributes()['width']) }}

            <label class="check-label">
                {{ Form::checkbox('is_width','true',$product->feature->getAttributes()['is_width'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('height', 'ارتفاع') }}
        <div class="d-flex">
            {{ Form::number('height', $product->feature->getAttributes()['height']) }}

            <label class="check-label">
                {{ Form::checkbox('is_height','true',$product->feature->getAttributes()['is_height'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('diameter', 'قطر') }}
        <div class="d-flex">
            {{ Form::number('diameter', $product->feature->getAttributes()['diameter']) }}

            <label class="check-label">
                {{ Form::checkbox('is_diameter','true',$product->feature->getAttributes()['is_diameter'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('volume', 'حجم') }}
        <div class="d-flex">
            {{ Form::number('volume', $product->feature->getAttributes()['volume']) }}

            <label class="check-label">
                {{ Form::checkbox('is_volume','true',$product->feature->getAttributes()['is_volume'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('purity', 'درصد خلوص') }}
        <div class="d-flex">
            {{ Form::number('purity', $product->feature->purity) }}

            <label class="check-label">
                {{ Form::checkbox('is_purity','true',$product->feature->getAttributes()['is_purity'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('density', 'گرماژ') }}
        <div class="d-flex">
            {{ Form::number('density', $product->feature->density) }}

            <label class="check-label">
                {{ Form::checkbox('is_density','true',$product->feature->getAttributes()['is_density'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('company_id', 'شرکت واردکننده/گارانتی/سازنده') }}
        <div class="d-flex">

            <select id="company_id" name="company_id">

                <option value="NULL">هیچ کدام</option>
                @foreach($company as $item)
                    <option value='{{ $item->id }}' {{$product->feature->company_id==$item->id ? 'selected' : ''}}>{{ $item->title }}</option>
                @endforeach
            </select>

            <label class="check-label">
                {{ Form::checkbox('is_company_id','true',$product->feature->getAttributes()['is_company_id'],['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('guarantee', 'مدت گارانتی') }}
        <div class="d-flex">
            {{ Form::number('guarantee', $product->feature->getAttributes()['guarantee']) }}

            <label class="check-label">
                {{ Form::checkbox('is_guarantee','true',$product->feature->getAttributes()['is_guarantee'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('warranty', 'مدت وارانتی') }}
        <div class="d-flex">
            {{ Form::number('warranty', $product->feature->getAttributes()['warranty']) }}

            <label class="check-label">
                {{ Form::checkbox('is_warranty','true',$product->feature->getAttributes()['is_warranty'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('kind', 'نوع') }}
        <div class="d-flex">
            {{ Form::select('kind', ['sterile' => 'استریل', 'nonsterile' => 'غیر استریل'], $product->feature->getAttributes()['kind'], ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
            <label class="check-label">
                {{ Form::checkbox('is_kind','true',$product->feature->getAttributes()['is_kind'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('mechanism', 'مکانیزم') }}
        <div class="d-flex">
            {{ Form::select('mechanism', ['mechanical' => 'مکانیکی', 'electrical' => 'برقی', 'charging' => 'شارژی', 'hand' => 'دستی', 'battery' => 'باتری', 'elec-batt' => 'برق/باتری'], $product->feature->getAttributes()['mechanism'], ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
            <label class="check-label">
                {{ Form::checkbox('is_mechanism','true',$product->feature->getAttributes()['is_mechanism'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('operation', 'کارکرد') }}
        <div class="d-flex">
            {{ Form::select('operation', ['automatic' => 'اتوماتیک', 'semiauto' => 'نیمه اتوماتیک', 'nonautomatic' => 'غیراتوماتیک'], $product->feature->getAttributes()['operation'], ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
            <label class="check-label">
                {{ Form::checkbox('is_operation','true',$product->feature->getAttributes()['is_operation'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
    <div class="cell medium-3">
        {{ Form::label('transport', 'حمل و نقل') }}
        <div class="d-flex">
            {{ Form::select('transport', ['huge' => 'خیلی بزرگ', 'big' => 'بزرگ', 'medium' => 'متوسط', 'small' => 'کوچک'], $product->feature->getAttributes()['transport'], ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
            <label class="check-label">
                {{ Form::checkbox('is_transport','true',$product->feature->getAttributes()['is_transport'],['class'=>'ed']) }}
            </label>
        </div>

    </div>
</div>
