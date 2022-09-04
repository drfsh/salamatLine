<div class="grid-x grid-padding-x checkbox-non-m">
    <div class="cell medium-3">
        {{ Form::label('day', 'زمان ارسال(روز کاری)') }}
        <div class="d-flex">
            {{ Form::number('day', null) }}
        </div>
    </div>

    <div class="cell medium-3">
        {{ Form::label('material', 'جنس') }}
        <div class="d-flex">
            <select name="material_id" id="material_id">
                <option value="NULL">هیچ کدام</option>
                @foreach($material as $item)
                    <option value='{{ $item->id }}'>{{ $item->title }}</option>
                @endforeach
            </select>
            <label class="check-label">
                {{ Form::checkbox('is_material_id','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('weight', 'وزن') }}
        <div class="d-flex">
            {{ Form::number('weight', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_weight','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('numberin', 'تعداد در بسته') }}
        <div class="d-flex">
            {{ Form::number('numberin', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_numberin','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('expire_at', 'تاریخ انقضا') }}
        <div class="d-flex">
            {{ Form::date('expire_at', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_expire_at','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('days', 'مدت زمان آماده سازی') }}
        <div class="d-flex">
            {{ Form::number('days', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_days','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('teamstar', 'امتیاز تیم سلامت‌لاین') }}
        <div class="d-flex">
            {{ Form::number('teamstar', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_teamstar','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('length', 'طول') }}
        <div class="d-flex">
            {{ Form::number('length', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_length','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('width', 'عرض') }}
        <div class="d-flex">
            {{ Form::number('width', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_width','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('height', 'ارتفاع') }}
        <div class="d-flex">
            {{ Form::number('height', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_height','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('diameter', 'قطر') }}
        <div class="d-flex">
            {{ Form::number('diameter', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_diameter','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('volume', 'حجم') }}
        <div class="d-flex">
            {{ Form::number('volume', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_volume','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('purity', 'درصد خلوص') }}
        <div class="d-flex">
            {{ Form::number('purity', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_purity','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('density', 'گرماژ') }}
        <div class="d-flex">
            {{ Form::number('density', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_density','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('company_id', 'شرکت واردکننده/گارانتی/سازنده') }}
        <div class="d-flex">
            <select id="company_id" name="company_id">
                <option value="NULL">هیچ کدام</option>
                @foreach($company as $item)
                    <option value='{{ $item->id }}'>{{ $item->title }}</option>
                @endforeach
            </select>
            <label class="check-label">
                {{ Form::checkbox('is_company_id','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('guarantee', 'مدت گارانتی') }}
        <div class="d-flex">
            {{ Form::text('guarantee', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_guarantee','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('warranty', 'توضیحات گارانتی') }}
        <div class="d-flex">
            {{ Form::text('warranty', null) }}
            <label class="check-label">
                {{ Form::checkbox('is_warranty','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('kind', 'نوع') }}
        <div class="d-flex">
            {{ Form::select('kind', ['sterile' => 'استریل', 'nonsterile' => 'غیر استریل'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
            <label class="check-label">
                {{ Form::checkbox('is_kind','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('mechanism', 'مکانیزم') }}
        <div class="d-flex">
            {{ Form::select('mechanism', ['mechanical' => 'مکانیکی', 'electrical' => 'برقی', 'charging' => 'شارژی', 'battery' => 'باتری', 'elec-batt' => 'برق/باتری'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
            <label class="check-label">
                {{ Form::checkbox('is_mechanism','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('operation', 'کارکرد') }}
        <div class="d-flex">
            {{ Form::select('operation', ['automatic' => 'اتوماتیک', 'semiauto' => 'نیمه اتوماتیک', 'nonautomatic' => 'غیراتوماتیک'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
            <label class="check-label">
                {{ Form::checkbox('is_operation','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>
    <div class="cell medium-3">
        {{ Form::label('transport', 'حمل و نقل') }}
        <div class="d-flex">
            {{ Form::select('transport', ['huge' => 'خیلی بزرگ', 'big' => 'بزرگ', 'medium' => 'متوسط', 'small' => 'کوچک'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
            <label class="check-label">
                {{ Form::checkbox('is_transport','true',true,['class'=>'ed']) }}
            </label>
        </div>
    </div>


    <div class="cell medium-12">
        {{ Form::label('more', 'سایر ویژگی ها') }}
        <div class="d-flex">
            <textarea name="more"></textarea>
        </div>
    </div>
</div>

