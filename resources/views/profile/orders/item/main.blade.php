<div class="gbox g">
	@include('profile.orders.item.head')
	<div class="body">
		<div class="grid-x grid-margin-x">
			@include('profile.orders.item.arrivedNoti')
			@if($item->survey)
				@include('profile.orders.item.survey')
			@endif
			@include('profile.orders.item.step.main')
			<div class="cell medium-10 medium-offset-1">
				@include('profile.orders.item.table')
			</div>
			<div class="gap"></div>
			@if($item->situation == 'unpaid')
				<div class="cell medium-10 medium-offset-1">
					<div class="grid-x grid-margin-x">
						<div class="cell medium-6">
							{!! Form::open(['method' => 'POST', 'route' => ['DeleteInvoice', $item->id],'onsubmit' => 'return confirm("از حذف این پیش‌فاکتور و تمام سفارشات آن اطمینان دارید؟")']) !!}
								<button type="submit" class="button small alert hollow">حذف پیش‌فاکتور</button>
							{!! Form::close() !!}
						</div>
						{{-- <div class="cell medium-6">
							<re-payment :invoice="{{$item}}" />
						</div> --}}
					</div>
				</div>
			@endif
		</div>
	</div>
	@include('profile.orders.item.footer')
</div>