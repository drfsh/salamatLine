@extends('layouts.profile')

@section('BreadCrumb')
	{{ Breadcrumbs::render('Edit') }}
@endsection

@section('content')


	{{ Form::model($user, array('route' => array('UpdateProfile', $user->id), 'method' => 'PUT')) }}

		<div class="grid-x grid-padding-x">
			@if (Session::has('success'))
				<div class="cell">
					<div class="cell callout success">
						{{ Session::get('success') }}
					</div>
					<div class="double-gap"></div>
				</div>
			@endif

			<div class="cell medium-6">
				{{ Form::label('name', 'نام') }}
				{{ Form::text('name', null) }}
				@if ($errors->has('name'))
					<span class="invalid-feedback">{{ $errors->first('name') }}</span>
				@endif				
			</div>
			<div class="cell medium-6">
				{{ Form::label('lname', 'نام خانوادگی') }}
				{{ Form::text('lname', null) }}
				@if ($errors->has('lname'))
					<span class="invalid-feedback">{{ $errors->first('lname') }}</span>
				@endif				
			</div>
			<div class="cell medium-6">
				{{ Form::label('email', 'ایمیل') }}
				{{ Form::text('email', null) }}
				@if ($errors->has('email'))
					<span class="invalid-feedback">{{ $errors->first('email') }}</span>
				@endif			
			</div>
			<div class="cell medium-6 large-3">
				{{ Form::label('mobile', 'موبایل') }}
				{{ Form::text('mobile', null) }}
				@if ($errors->has('mobile'))
					<span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
				@endif			
			</div>
			<div class="cell medium-6 large-3">
				{{ Form::label('phone', 'تلفن ثابت') }}
				{{ Form::text('phone', null) }}
				@if ($errors->has('phone'))
					<span class="invalid-feedback">{{ $errors->first('phone') }}</span>
				@endif			
			</div>
		</div>

		{{ Form::submit('ویرایش', array('class' => 'button success')) }}
		<a href="{{ url()->previous() }}" class="button alert hollow">بازگشت</a>

	{{ Form::close() }}
  

 
@endsection