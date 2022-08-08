@if (Session::has('reviewsuccess'))
<div class="grid-x">
    <div class="cell">
        <div class="callout success">
            {{ Session::get('reviewsuccess') }}
        </div>
        <div class="gap"></div>
    </div>
</div>
@endif
@if (Auth::check())
	{!! Form::open(['url' => route('review', $data['product']->slug), 'method' => 'POST']) !!}

        {{ Form::label('recommend', 'آیا محصول را پیشنهاد میکنید؟') }}
        {{ Form::radio('recommend', 'No') }}
        {{ Form::label('recommend', 'خیر') }}
        {{ Form::radio('recommend', 'Yes') }}
        {{ Form::label('recommend', 'بله') }}
        @if ($errors->has('recommend'))
            <span class="label warning">
                <strong>{{ $errors->first('recommend') }}</strong>
            </span>
        @endif
        <br>
        {{ Form::label('rating', 'نمره شما') }}
        {{ Form::radio('rating', 1) }}
        {{ Form::label('rating', '1') }}
        {{ Form::radio('rating', 2) }}
        {{ Form::label('rating', '2') }}
        {{ Form::radio('rating', 3) }}
        {{ Form::label('rating', '3') }}
        {{ Form::radio('rating', 4) }}
        {{ Form::label('rating', '4') }}
        {{ Form::radio('rating', 5) }}
        {{ Form::label('rating', '5') }}
        @if ($errors->has('rating'))
            <span class="label warning">
                <strong>{{ $errors->first('rating') }}</strong>
            </span>
        @endif

        {{ Form::textarea('body', null, ['rows' => 3, 'placeholder' => 'نظر شما در مورد این محصول']) }}
        @if ($errors->has('body'))
            <span class="label warning">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif

        {{ Form::submit('ارسال', array('class' => 'button success')) }}

	{!! Form::close() !!}
@else
	<div class="callout warning">جهت ارسال نظرات خود در مورد این محصول <a href="{{ route('login')}}">وارد</a> شوید.</div>
@endif
