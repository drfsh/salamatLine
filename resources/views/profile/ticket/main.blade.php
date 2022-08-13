@extends('layouts.profile')

@section('content')
    <div class="grid-x grid-padding-x ">
        <div class="cell">
            <div class=" box2">
                <div class="title _2">
                    <span>تیکت ها</span>
                    <div class="sub-title">
                        <div class="info">
                            تیکت های پشتیبانی شما در این صفحه لیست شده اند
                        </div>
                        <div>
                            <a href="{{route('NewTickets')}}">
                                <button class="btn-new-ticket">ارسال تیکت جدید</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div style="padding: 0 22px 22px;">

                    <ticket-list></ticket-list>

                </div>
            </div>
        </div>

    </div>
@endsection
