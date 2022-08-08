<div class="double-gap"></div>

<div class="grid-x align-center ">
	<div class="cell medium-6 large-shrink">
		<div class="box total-time">
			<div class="b n1"><span class="text-thin">این فصل ({{$data['season']}}) : </span><b class="float-left">{{number_format($data['total_quarter'])}}</b></div>
			<div class="b n2"><span class="text-thin">این ماه ({{$data['month_name']}}) : </span><b class="float-left">{{number_format($data['total_month'])}}</b></div>
			<div class="b n3"><span class="text-thin">این هفته ({{$data['week_name']}}) : </span><b class="float-left">{{number_format($data['total_week'])}}</b></div>
			<div class="b n4"><span class="text-thin">امروز ({{$data['today_name']}}) : </span><b class="float-left">{{number_format($data['total_today'])}}</b></div>
			<div class="b n5"><span class="text-thin">دیروز ({{$data['today_yesterday']}}) : </span><b class="float-left">{{number_format($data['total_yesterday'])}}</b></div>
		</div>
	</div>
</div>
<div class="double-gap"></div>
