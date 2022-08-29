@if($data['product']->active)
	<product-add-cart
		price="{{$data['product']->showing_price}}"
		:id="{{$data['product']->id}}">
	</product-add-cart>

	<add-cart v-show="false"
:pid="{{$data['product']->id}}" 
:multiprice="{{$data['product']['multiprice']}}" 
:multifeature="{{$data['product']['multifeature']}}" 
:singleprice="'{{$data['product']->price}}'"
:discount="{{$data['product']['discount']}}"
redirect="{{ url()->current() }}"
:auth="{{ !empty(Auth::user()->id) ? Auth::user()->id : '0' }}"
 />
@else
	<div class="">
		<div class="title text-center"><b>ناموجود</b></div>
		<p><small>متاسفانه این کالا در حال حاضر موجود نیست. می‌توانید از طریق لیست زیر، از محصولات مشابه این کالا دیدن نمایید</small></p>
		<div class="gap"></div>
		<re-stock :pid="{{$data['product']->id}}"  />
	</div>
@endif