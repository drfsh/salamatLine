<div class="grid-x grid-padding-x">
    <div class="cell medium-6">
        {{ Form::label('featured_image', 'تصویر اصلی') }}
        {{ Form::file('featured_image') }}
    </div>
    <div class="cell medium-6">
        {{ Form::label('photos', 'دیگر تصاویر') }}
        {{ Form::file('photos[]', ['multiple' => 'multiple']) }}
    </div>
</div>