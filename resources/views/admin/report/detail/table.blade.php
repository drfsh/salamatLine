<div class="large-table">
	<table class="hover table-bordered">
		<thead>
			<tr>
				<th class="text-center" width="40"><small>ردیف</small></th>
				<th class="text-center" width="40">شماره سفارش</th>
				<th class="text-center" width="200">شماره پرداخت</th>
				<th class="text-center" width="70">مبلغ فاکتور</th>
				<th class="text-center" width="40">تعداد سفارش</th>
				<th class="text-center" width="100">مبلغ سفارش</th>
				<th class="text-center" width="100">کاربر</th>
				<th width="50" class="text-center">تاریخ پرداخت</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data['detail'] as $item)
				<tr>
					<td class="text-center">{{$data['detail']->perPage()*($data['detail']->currentPage()-1)+ $loop->iteration}}</td>
					<td class="text-center"><a target="_blank" href="{{route('ShowInvoice', $item->invoice->id)}}">{{ $item->invoice_id }}</a></td>
					<td class="text-center"><a target="_blank" href="{{route('ShowInvoice', $item->invoice->id)}}">{{ $item->invoice->pay_num }}</a></td>
					<td class="text-center">{{number_format(($item->invoice->grand_total)/10)}}</td>
					<td class="text-center">{{ $item->qty }}</td>				
					<td class="text-center"><b>{{number_format(($item->total)/10)}}</b></td>
					<td class="text-center">{{ $item->invoice->user->name }} {{ $item->invoice->user->lname }}</td>
					<td><small>{{$item->invoice->pay_date}}</small></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
