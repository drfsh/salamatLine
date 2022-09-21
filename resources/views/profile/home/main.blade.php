@extends('layouts.profile')

@section('content')
	@if($errors->any())
		<div class="callout success">
			{{$errors->first()}}
		</div>
	@endif
    @include('profile.home.detail')
@endsection
