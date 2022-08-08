<div class="cell">
	<div class="progress-bar-container">
		<div class="progress-bar">
			<div class="progress-bar__circles">
				@if($item->situation == 'unpaid')
					@include('profile.orders.item.step.unpaid')
				@elseif($item->situation == 'paid')
					@include('profile.orders.item.step.Paid')
				@elseif($item->situation == 'production')
					@include('profile.orders.item.step.Producing')
				@elseif($item->situation == 'sending')
					@include('profile.orders.item.step.Sending')
				@elseif($item->situation == 'arrived')
					@include('profile.orders.item.step.arrived')
				@elseif($item->situation == 'finish')
					@include('profile.orders.item.step.finish')
				@endif
			</div>
		</div>
	</div>
</div>