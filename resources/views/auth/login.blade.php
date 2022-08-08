@extends('layouts.auth')

@section('content')
    <div class="auth-box"> 
        <div class="body">
			<ul class="tabs" data-tabs id="example-tabs">
				<li class="tabs-title is-active"><a href="#panel1" aria-selected="true">پیامک</a></li>
				<li class="tabs-title"><a data-tabs-target="panel2" href="#panel2">ایمیل</a></li>
				<li class="tabs-title"><a data-tabs-target="panel3" href="#panel3">شبکه‌های اجتماعی</a></li>
			</ul>

			<div class="tabs-content" data-tabs-content="example-tabs">
				<div class="tabs-panel is-active" id="panel1">
					<sms-login/>
				</div>
				<div class="tabs-panel" id="panel2">
					@include('auth.login.form')
				</div>
                <div class="tabs-panel" id="panel3">
                	@include('auth.login.google.main')
                </div>				
			</div>
        </div>
        <div class="footer text-center text-thin">
			<small>در صورتی که تاکنون عضو نشده‌اید <a href="{{ route('register')}}">اینجا</a> را کلیک کنید.</small>
        </div>
    </div>
@endsection
