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