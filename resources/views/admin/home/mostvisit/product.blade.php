<div class="gbox g">
	<div class="head">پربازدیدترین محصولات</div>
	<div class="body">
		<table class="hover table-bordered">
			<thead>
				<tr>
					<th class="text-center" width="40"><small>رتبه</small></th>
					<th width="200">عنوان</th>
					<th class="text-center" width="70"><small>تعداد بازدید</small></th>
				</tr>
			</thead>
			<tbody>
				@foreach($data['mvp']->take(20) as $item)
					<tr>
						<td class="text-center">{{ $loop->iteration }}</td>
						<td><a href="{{ $item['url'] }}" target="_blank">{{ $item['pageTitle'] }}</a></td>
						<td class="text-center">{{ $item['pageViews'] }}</td>
					</tr>
				@endforeach

			</tbody>
		</table>
	</div>
	<div class="footer text-center"><small>این آمار مربوط به {{$days}} روز گذشته است.</small></div>
</div>