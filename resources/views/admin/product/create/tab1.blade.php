<div class="grid-x grid-padding-x">
    <div class="cell medium-4">
        {{ Form::label('title', 'نام محصول') }}
        {{ Form::text('title', null) }}
        @if ($errors->has('title'))
            <span class="label warning">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    <div class="cell medium-4">
        {{ Form::label('title_en', 'نام انگلیسی') }}
        {{ Form::text('title_en', null) }}
        @if ($errors->has('title_en'))
            <span class="label warning">
                <strong>{{ $errors->first('title_en') }}</strong>
            </span>
        @endif
    </div>
    <div class="cell medium-4">
        {{ Form::label('subtitle', 'مدل') }}
        {{ Form::text('subtitle', null) }}
    </div>
    <div class="cell medium-4">
        {{ Form::label('slug', 'تکه آدرس URL') }}
        {{ Form::text('slug', null) }}
        @if ($errors->has('slug'))
            <span class="label warning">
                <strong>{{ $errors->first('slug') }}</strong>
            </span>
        @endif
    </div>
    <div class="cell medium-6">
        {{ Form::label('category', 'دسته‌بندی') }}
        <select class="simple-select" name="category_id[]" multiple>
            @foreach($allcategories as $item)
                <option value='{{ $item->id }}'>{{ $item->name }}</option>
            @endforeach
        </select>
    </div>


    <div class="cell medium-6">
        {{ Form::label('brand', 'برند') }}
        <select class="simple-select" name="brand_id">
            <option value="NULL">بدون برند</option>
            @foreach($brand as $item)
                <option value='{{ $item->id }}'>{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="cell medium-6">
        {{ Form::label('country', 'کشور سازنده') }}
        <select class="simple-select" name="country_id">
            <option value="NULL">بدون کشور</option>
            @foreach($country as $item)
                <option value='{{ $item->id }}'>{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="cell medium-2">
        {{ Form::label('featured', 'برگزیده') }}
        {{ Form::checkbox('featured', null) }}
    </div>
    <div class="cell medium-2">
        {{ Form::label('active', 'فعال') }}
        {{ Form::checkbox('active', null, true) }}
    </div>
</div>
