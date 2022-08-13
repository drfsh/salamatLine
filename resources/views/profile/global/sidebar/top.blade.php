<div class="ProfileName">
	<div class="pic">
		<div class="hupload">
				<img style="border-radius: 100%;" src="{{Auth::user()->avatar}}">
			<label class="upload" for="FileUpload">
				<i style="width: 15px;height: 15px;">
                    @include('icons.edit')
                </i>
			</label>
		</div>
		{!! Form::open(['route'=>'ChangeAvatar','method' => 'PUT','class'=>'hide','files'=>true]) !!}
			<input name="profile" id="FileUpload" type="file" onchange="this.form.submit();">
			<button type="submit" class="button success">افزودن</button>
		{!! Form::close() !!}
	</div>
	<div class="title">
		{{ Auth::user()->name }}
		@if(Auth::user()->lname)
			{{ Auth::user()->lname }}
		@endif
	</div>
{{--	<div class="grid-x">--}}
{{--		<div class="cell small-6 b">--}}
{{--			<a href="{{ route('ChangePassword')}}">تغییر رمز عبور</a>--}}
{{--		</div>--}}
{{--		<div class="cell small-6">--}}
{{--			<a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>--}}
{{--			<form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">{{ csrf_field() }} </form>--}}
{{--		</div>--}}
{{--	</div>--}}
</div>
