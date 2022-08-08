<div class="gbox g">
	<div class="head">پرفروش‌ترین محصولات از لحاظ تعداد فروش</div>
	<div class="body">
{{-- 		<div class="large-table"> --}}
			<table class="hover table-bordered">
				<thead>
					<tr>
						<th class="text-center" width="40"><small>رتبه</small></th>
						<th class="text-center" width="40"><small>تصویر</small></th>
						<th class="text-center" width="200">کد</th>
						<th class="text-center" width="100">تعداد فروش</th>
						<th width="50" class="text-center">جزئیات</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($data['MostSell'] as $item)
						<tr>
							<td class="text-center">{{$data['MostSell']->perPage()*($data['MostSell']->currentPage()-1)+ $loop->iteration}}</td>
							<td class="text-center">
								@if($item->product)
									<a class="en" href="{{ route('product',$item->product->slug)}}" target="_blank">
										<img width="50" src="{{$item->product->tiny}}">
									</a>
								@endif
							</td>
							<td class="text-center">
								@if($item->product)
								@if($item->product)
									<a href="{{ route('product',$item->product->slug)}}" target="_blank"><small>{{ $item->product->title }}</small></a>
								@endif
								@endif
							</td>
							<td class="text-center"><b>{{ $item->totalQTY }}</b> عدد در <b>{{ $item->total }}</b> سفارش</td>
							<td class="action text-center"><a href="{{ route('OrderDeatil', $item->product->slug) }}" class="edit" target="_blank"><i class="far fa-file-alt"></i></a></td>
						</tr>
					@endforeach

				</tbody>
			</table>
{{-- 		</div> --}}
	</div>
	<div class="footer text-center">
		<small>تاریخ این اطلاعات از روز اول فروش می‌باشد.</small>
		<div class="half-gap"></div>
		<div class="nb">
			{!! $data['MostSell']->links(); !!}
		</div>
	</div>
</div>