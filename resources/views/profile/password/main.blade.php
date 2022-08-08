@extends('layouts.profile')

@section('BreadCrumb')
	{{ Breadcrumbs::render('Password') }}
@endsection

@section('content')
	<div class="gap"></div>
	<div class="grid-x">
		<div class="cell medium-6 large-4 medium-offset-3 large-offset-4">
			@if($errors->any())
				<div class="callout secondary">
					{{$errors->first()}}
				</div>
			@endif
			<div class="gbox g">
				<div class="head">تغییر رمز عبور</div>
				<div class="body">
					@include('profile.password.form')
				</div>
			</div>	
			<div class="callout warning"><small>در صورتی که اولین بار با موبایل (بدون تعیین رمز عبور) وارد شده‌اید، مقدار <b>رمز عبور قدیم</b> را خالی بگذارید.</small></div>	
		</div>
	</div>
@endsection