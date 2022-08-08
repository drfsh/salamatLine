@if($item->situation == 'finish' && (\Carbon\Carbon::parse($item->survey->created_at) == \Carbon\Carbon::parse($item->survey->updated_at)))
	<div class="cell">
		<div class="callout success text-center">
			<p>با شرکت در نظرسنجی این سفارش ما را در ارتقای بهبود خدمات یاری کنید.</p>

			<div class="gap"></div>
            <a href="{{ route('Survey', $item->id) }}" type="submit" class="button success">
                نظرسنجی این سفارش
            </a>	
		</div>

	</div>
@endif