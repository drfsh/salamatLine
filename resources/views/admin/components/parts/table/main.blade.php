<div class="grid-x grid-padding-x">
	<div class="cell">
		<div class="box shadow rounded hover">
			<div class="heading">
				<div class="grid-x">
					<div class="cell medium-6"><h4>جدول</h4></div>
					<div class="cell medium-6 date">    
						<div class="float-right">

						</div> 

					</div>
				</div>
			</div>

			<table class="hover">
				<thead>
					<tr>
						<th width="200">سرتیتر</th>
						<th>سرتیتر</th>
						<th width="200">سرتیتر</th>
						<th class="text-center">سرتیتر</th>
					</tr>
				</thead>
				<tbody>
					@include('admin.components.parts.table.item')
					@include('admin.components.parts.table.item')
					@include('admin.components.parts.table.item')
				</tbody>
			</table>

			@include('admin.components.pagination')

		</div>
	</div>
</div>
