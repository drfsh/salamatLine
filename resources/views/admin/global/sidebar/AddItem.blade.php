<!-- Close button -->
<button class="close-button" aria-label="Close menu" type="button" data-close>
  <span aria-hidden="true">&times;</span>
</button>

<div class="double-gap"></div>
<div class="double-padding">
	<a class="button small success expanded" href="{{ route('product.create') }}">محصول</a>
	<a class="button small success expanded" href="{{ route('category.create') }}">دسته‌بندی</a>
	<hr>
	<a class="button small primary expanded" href="{{ route('brand.create') }}">برند</a>
	<a class="button small primary expanded" href="{{ route('country.create') }}">کشور</a>
	<a class="button small primary expanded" href="{{ route('material.create') }}">جنس</a>
	<hr>
	<a class="button small warning expanded" href="{{ route('slider.create') }}">اسلایدر</a>
	<a class="button small warning expanded" href="{{ route('discount.create') }}">تخفیف</a>
	<a class="button small warning expanded" href="{{ route('coupon.create') }}">کوپن</a>
{{-- 	<a class="button small warning expanded" href="{{ route('coupon.create') }}">روز تعطیل</a> --}}
	<hr>
	<a class="button small alert expanded" href="{{ route('users.create') }}">کاربر</a>
	<a class="button small alert expanded" href="{{ route('mobile.create') }}">کاربر (شماره موبایل)</a>
	<a class="button small alert expanded" href="{{ route('permissions.create') }}">افزودن مجوز</a>
	<a class="button small alert expanded" href="{{ route('roles.create') }}">افزودن نقش</a>
</div>