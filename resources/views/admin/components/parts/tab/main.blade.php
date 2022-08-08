<div class="grid-x grid-padding-x" data-equalizer data-equalize-on="medium">
	<div class="cell large-6">
		<div class="box shadow rounded hover space" data-equalizer-watch>
			<div class="heading">
				<h4>تبِ افقی</h4>
			</div>

			@include('admin.components.parts.tab.horizontal')
		</div>
	</div>
	<div class="cell large-6">
		<div class="box shadow rounded hover space" data-equalizer-watch>
			<div class="heading">
				<h4>تبِ عمودی</h4>
			</div>
			@include('admin.components.parts.tab.vertical')
		</div>
	</div>
	<div class="cell">
		@include('admin.components.parts.tab.accordion')
	</div>

</div>
