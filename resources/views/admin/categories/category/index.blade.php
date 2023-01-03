@extends('layouts.admin')

@section('NavItems')
	@include('admin.categories.NavItems')
@endsection

@section('content')
	<div class="grid-x grid-padding-x admin-category">
		<div class="cell medium-10 medium-offset-2" style="margin: auto;">
			@if (Session::has('success'))
				<div class="cell callout success">
					{{ Session::get('success') }}
				</div>
				<div class="double-gap"></div>
			@endif
                <div class="title_b">دسته بندی ها</div>
    		<div class="double-gap"></div>

				<div id="category-admin" style="position:relative;"></div>
{{--			<div class="grid-x">--}}
{{--				@foreach ($categories as $item)--}}
{{--					<div class="cell">--}}
{{--						@include('admin.categories.category.main.root')--}}
{{--					</div>--}}
{{--				@endforeach--}}
{{--			</div>--}}

		</div>
	</div>
@endsection
