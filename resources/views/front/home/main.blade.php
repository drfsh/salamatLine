@extends('layouts.front')

@section('content')
	@include('front.home.header.main')
	@include('front.home.featured.main')
	@include('front.home.banner.section1')
	@include('front.home.box.main')
	@include('front.home.banner.section2')
	@include('front.home.cat')
{{--	@include('front.home.latest')--}}
	@include('front.home.country.main')
@endsection
