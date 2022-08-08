<tr class="text-center">
	<td>{{$loop->iteration}}</td>

	<td>
		@if($order->product)
		<a href="{{ route('product',$order->product->slug)}}" target="_blank">
			{{$order->product->title}}
		</a>
		@endif
	</td>

	<td>{{number_format($order->price)}}</td>
	<td>{{$order->qty}}</td>

	<td><b>{{number_format($order->qty * $order->price)}}</b></td>
	<td>
		@if(isset($order->detail->content))
		<small>{{$order->detail->content}}</small>
		@else
		-
		@endif
	</td>
	<td class="action text-center"><a href="{{ route('OrderDeatil', $order->product->slug) }}" class="edit" target="_blank" title="آمار فروش"><i class="far fa-file-alt"></i></a></td>
</tr>