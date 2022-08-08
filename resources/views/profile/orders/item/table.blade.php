<table class="table-bordered hover">
	<thead>
		<tr>
			<th class="text-center">نام محصول</th>
			<th class="text-center">قیمت واحد<small> (تومان)</small></th>
			<th class="text-center">تعداد</th>
			<th class="text-center">مجموع <small> (تومان)</small></th>
			<th class="text-center">جزئیات</th>
		</tr>
	</thead>
	<tbody class="text-center">
		@foreach($item->orders as $item)
		<tr>
			<td class="en">
				<a href="{{ route('product',$item->product->slug)}}" target="_blank">
					{{$item->product->title}}
				</a>

			</td>

			<td>
				{{number_format($item->price/10)}}
			</td>

			<td >
				{{$item->qty}}
			</td>

			<td>
				{{number_format(($item->total)/10)}}
			</td>

			<td>
				@if($item->detail)
					{{$item->detail->content}}
				@else
					-
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>