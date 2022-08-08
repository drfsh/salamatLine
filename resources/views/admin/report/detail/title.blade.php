<div class="gbox g">
	<div class="body">
		<div class="grid-x grid-padding-x">
			<div class="cell shrink">
				<a class="en" href="{{ route('product',$data['product']->slug)}}" target="_blank">
					<img width="75" src="{{$data['product']->tiny}}">
				</a>
			</div>
			<div class="cell auto">
				<div class="double-gap"></div>
				<h1>سفارشاتِ پرداخت شده مربوط به <a href="{{ route('product',$data['product']->slug)}}" target="_blank">
					<span>{{$data['product']->slug}}</span> @if($data['product']->title) ({{$data['product']->title}}) @endif</a>
				</h1>
			</div>
		</div>
	
	</div>
</div>