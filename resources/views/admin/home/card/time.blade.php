<div class="box steps ">
		<div class="box total-time">
			<div class="n1 n"><span class="text-thin">این فصل ({{$data['season']}}) : </span><b class="float-left">{{number_format($data['total_quarter'])}}</b></div>
			<div class="n2 n"><span class="text-thin">این ماه ({{$data['month_name']}}) : </span><b class="float-left">{{number_format($data['total_month'])}}</b></div>
			<div class="n3 n"><span class="text-thin">این هفته ({{$data['week_name']}}) : </span><b class="float-left">{{number_format($data['total_week'])}}</b></div>
			<div class="n4 n"><span class="text-thin">امروز ({{$data['today_name']}}) : </span><b class="float-left">{{number_format($data['total_today'])}}</b></div>
			<div class="n5 n"><span class="text-thin">دیروز ({{$data['today_yesterday']}}) : </span><b class="float-left">{{number_format($data['total_yesterday'])}}</b></div>
		</div>
</div>
<div class="double-gap"></div>
