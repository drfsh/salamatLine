<ul class="breadcrumbs">
	<li class="{{\App\Traits\CheckRoute::check('admins')}}"><a href="{{ route('admins') }}">مدیران</a></li>
	<li class="{{\App\Traits\CheckRoute::check('users.index')}}"><a href="{{ route('users.index') }}"> کاربران سایت</a></li>
	<li class="{{\App\Traits\CheckRoute::check('person.index')}}"><a href="{{ route('person.index') }}"> کاربران حضوری</a></li>
	<li class="{{\App\Traits\CheckRoute::check('colleague.index')}}"><a href="{{ route('colleague.index') }}"> کاربران همکار</a></li>
	<li class="line">-</li>
	<li class="{{\App\Traits\CheckRoute::check('permissions.index')}}"><a href="{{ route('permissions.index') }}">مجوزها</a></li>
	<li class="{{\App\Traits\CheckRoute::check('roles.index')}}"><a href="{{ route('roles.index') }}">نقش‌ها</a></li>
</ul>
