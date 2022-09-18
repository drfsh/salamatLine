<div class="GlobalNavigation">
	<div class="gap"></div>
	<ul class="vertical">
		<li>
			<a href="/">
				<i class="fas fa-home"></i>
			</a>
			</li>
		<li>
			<a data-toggle="AddItem">
				<i class="fas fa-plus"></i>
			</a>
		</li>
	</ul>
	<div class="bottom">
		<ul class="vertical">
			<li class="profile">
				<a href="{{ route('profile') }}" target="_blank">
					<img src="{{Auth::user()->avatar}}">
				</a>
			</li>
			<li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-door-open"></i></a></li>
		</ul>
	</div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
    {{ csrf_field() }}
</form>
