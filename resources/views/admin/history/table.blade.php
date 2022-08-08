<table class="hover">
	<thead>
		<tr>
			<th class="text-center">مدل</th>
			<th class="text-center">نوع تغییر</th>
			<th class="text-center">مقدار قدیمی</th>
			<th class="text-center">اطلاعات تغییر کرده</th>
			<th class="text-center">کاربر</th>
			<th class="text-center">تاریخ</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $item)
			<tr class="text-center">
				<td>@include('admin.history.table.model')</td>
				<td>@include('admin.history.table.event')</td>
				<td>
					@foreach($item->old_values as $attribute  => $value)                                 
					    <div> <b>{{ $attribute }}</b>: {{ $value }}</div>                 
					@endforeach
				</td>
				<td>
					@foreach($item->new_values as $attribute  => $value)                                 
					    <div> <b>{{ $attribute }}</b>: {{ $value }}</div>                 
					@endforeach
				</td>
				<td>{{$item->user->name}} {{$item->user->lname}}</td>
				<td>{{Verta($item->created_at)->format('l %d %B %Y - H:i')}}</td>
			</tr>
		@endforeach
	</tbody>
</table>