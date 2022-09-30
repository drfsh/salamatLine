@extends('layouts.admin')

@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection

@section('content')
    <div class="double-gap"></div>
    <div class="double-gap"></div>

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">افزودن کاربر همکار</div>
                <div class="content">
                    {{ Form::open(array('url' => 'admin/colleague')) }}

                    {{ Form::label('name', 'نام') }}
                    {{ Form::text('name', '', array('class' => '')) }}


                    {{ Form::label('number', 'موبایل') }}
                    {{ Form::text('number', '', array('class' => '')) }}

                    {{ Form::label('email', 'ایمیل') }}
                    {{ Form::email('email', '', array('class' => '')) }}


                    <input type="hidden" name="type_buy" value="0">
                    <input type="hidden" name="price_buy" value="0">

                    <div class="double-gap"></div>

                    {{ Form::submit('افزودن', array('class' => 'button success')) }}
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
