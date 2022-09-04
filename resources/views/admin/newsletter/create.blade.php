@extends('layouts.admin')


@section('content')
    <div class="double-gap"></div>
    <div class="double-gap"></div>

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">ارسال خبرنامه</div>
                <div class="content">
                    {{ Form::open(array('url' => 'admin/newsletter')) }}

                    {{ Form::label('title', 'موضوع') }}
                    {{ Form::text('title', '', array('class' => '')) }}


                    {{ Form::label('text', 'متن') }}
                    {{ Form::textarea('text', '', array('class' => '')) }}

                    {{ Form::submit('ارسال', array('class' => 'button success')) }}
                    <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>

@endsection

@section('js')

    <script>
        $('input.number').keyup(function(event) {

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    ;
            });
        });
    </script>

@endsection
