<div class="gbox g detail">
	<div class="grid-x">
		<div class="cell medium-6 bl b">
			<span>نام و نام‌خانوادگی</span>
			<div class="title">	
				{{ Auth::user()->name }}
				@if(Auth::user()->lname)
					{{ Auth::user()->lname }}
				@endif
			</div>
		</div>
		<div class="cell medium-6 b">
			<span>ایمیل</span>
			<div class="title">{{ Auth::user()->email }}</div>
		</div>
		<div class="cell medium-6 bl b">
			<span>تلفن همراه</span>
			<div class="title">
				@if(Auth::user()->mobile)
					{{ Auth::user()->mobile }}
				@else
					ثبت نشده است.
				@endif	
			</div>
		</div>
		<div class="cell medium-6 b">
			<span>تلفن ثابت</span>
			<div class="title">
				@if(Auth::user()->phone)
					{{ Auth::user()->phone }}
				@else
					ثبت نشده است.
				@endif	
			</div>
		</div>
		<div class="cell text-center">
			<a href="{{ route('ProfileEdit')}}">
				<i class="fas fa-edit"></i>ویرایش اطلاعات
			</a>

		</div>
	</div>
</div>