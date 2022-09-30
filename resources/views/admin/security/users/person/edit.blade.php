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
                <div class="heading">ویرایش کاربر حضوری</div>
                <div class="content">
                    {{ Form::model($user, array('route' => array('person.update', $user->id), 'method' => 'PUT')) }}

                    {{ Form::label('name', 'نام') }}
                    {{ Form::text('name', null, array('class' => '')) }}


                    {{ Form::label('number', 'موبایل') }}
                    {{ Form::text('number', null, array('class' => '')) }}

                    {{ Form::label('email', 'ایمیل') }}
                    {{ Form::email('email', null, array('class' => '')) }}


                    {{ Form::label('role', 'شماره فاکتور') }}
                    {{ Form::text('role', null, array('class' => '')) }}

{{--                    {{ Form::label('role', 'نقش') }}--}}
{{--                    <select name="role">--}}
{{--                        <option value="1" @if($user['role']=='ادمین') selected @endif>ادمین</option>--}}
{{--                        <option value="2" @if($user['role']=='همکار') selected @endif>همکار</option>--}}
{{--                        <option value="3" @if($user['role']=='خریدار') selected @endif>خریدار</option>--}}
{{--                    </select>--}}

{{--                    {{ Form::label('type_buy', 'نوع خرید') }}--}}
{{--                    <select name="type_buy">--}}
{{--                        <option value="1" @if($user['type_buy']=='خرید آنلاین') selected @endif>خرید آنلاین</option>--}}
{{--                        <option value="2" @if($user['type_buy']=='خرید حضوری') selected @endif>خرید حضوری</option>--}}
{{--                        <option value="3" @if($user['type_buy']=='خرید همکار') selected @endif>خرید همکار</option>--}}
{{--                    </select>--}}

                    {{ Form::label('price_buy', 'مقدار خرید') }}
                    <div class="input-group">
                        {{ Form::text('price_buy', null, ['class' => 'number input-group-field']) }}
                        <span class="input-group-label">تومان</span>
                    </div>

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
        $('input.number').keyup(function (event) {

            // skip for arrow keys
            if (event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function (index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    ;
            });
        });
    </script>

@endsection
