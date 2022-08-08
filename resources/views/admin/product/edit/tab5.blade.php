{{ Form::label('content', 'محتوا') }}
{{ Form::textarea('content', $product->feature->content, ['id' => 'editor']) }}