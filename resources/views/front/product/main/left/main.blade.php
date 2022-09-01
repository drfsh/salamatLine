@include('front.product.main.tabs.feature.feature')

@if($data['product']->feature->teamstar)
	<x-product.star title="امتیاز سلامت‌لاین" percent="{{($data['product']->feature->teamstar*10)}}" />
@endif

@if($data['rate_percent'])
	<x-product.star title="امتیاز کاربران  ({{$data['countRate']}})" percent="{{$data['rate_percent']}}" />
@endif
