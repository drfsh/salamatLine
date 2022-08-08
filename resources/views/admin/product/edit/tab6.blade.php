@if($product->seo)
    <div class="grid-x grid-padding-x">
        <div class="cell medium-6">
            {{ Form::label('metadesc', 'MetaDesc') }}
            {{ Form::textarea('metadesc', $product->seo->metadesc, ['rows' => 3]) }}
        </div>
        <div class="cell medium-6">
            {{ Form::label('keywords', 'کلمات کلیدی') }}
            {{ Form::textarea('keywords', $product->seo->keywords, ['rows' => 3]) }}
        </div>
    </div>
@else
    <div class="grid-x grid-padding-x">
        <div class="cell medium-6">
            {{ Form::label('metadesc', 'MetaDesc') }}
            {{ Form::textarea('metadesc', null, ['rows' => 3]) }}
        </div>
        <div class="cell medium-6">
            {{ Form::label('keywords', 'کلمات کلیدی') }}
            {{ Form::textarea('keywords', null, ['rows' => 3]) }}
        </div>
    </div>
@endif