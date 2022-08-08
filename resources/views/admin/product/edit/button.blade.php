<div class="double-gap"></div>
{{ Form::submit('ذخیره', array('class' => 'button success')) }}
<a href="{{ route('product', $product->slug) }}" class="button" target="_blank">مشاهده</a>
<a href="{{ route('product.index') }}" class="button alert">بازگشت</a>
<div class="double-gap"></div>