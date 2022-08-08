<div class="line">
	<div class="grid-x hrid-padding-x align-middle">
		<div class="cell medium-auto">
			<ul class="detail">
				<li>آدرس: 
					@if($globalcontact[0]->mapurl)
						<a class="inline" href="{{$globalcontact[0]->mapurl}}" target="_blank" rel="noopener noreferrer">{{$globalcontact[0]->address}}</a>
					@else
						{{$globalcontact[0]->address}}
					@endif
				</li>
				<li>شماره تلفن: <a class="inline" href="tel:{{$globalcontact[0]->phone1}}">{{$globalcontact[0]->phone1}}</a></li>
				<li>ایمیل: <a class="inline" href="mailto:{{$globalcontact[0]->email}}">{{$globalcontact[0]->email}}</a></li>
			</ul>
		</div>
		<div class="cell medium-shrink">
			<ul class="social">
				@foreach($social as $item)
					<li><a  href="{{$item->link}}" title="{{$item->title}}"><i class="fab {{$item->icon}}" target="_blank" rel="noopener noreferrer"></i></a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
<div class="gap show-for-small-only"></div>