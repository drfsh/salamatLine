@extends('layouts.profile')

@section('content')
    <div class="grid-x grid-padding-x ">
        <div class="cell">
            <div class=" box2">
                <div class="title ">
                    ارسال تیکت

                    <a href="{{route('Tickets')}}">
                    <span role="button" class="back-ticket">
                        بازگشت به تیکت ها
                    <svg style="margin-right: 7px" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2Z"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 9.5H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 14.5H14" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    </span>
                    </a>
                </div>
                <div style="padding: 0 22px 22px;">
                    <div class="bbox" style="padding: 25px 20px">
                        {{ Form::model(array('route' => array('UpdateProfile'), 'method' => 'PUT')) }}
                        <div class="grid-x grid-padding-x">

                            <div class="cell medium-6">
                                {{ Form::label('title', 'عنوان تیکت') }}
                                {{ Form::text('title', null) }}
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">{{ $errors->first('title') }}</span>
                                @endif
                            </div>


                            <div class="cell medium-6">
                                {{ Form::label('type', 'واحد پشتیبانی') }}
                                <select class="simple-select" id="type" name="type">
                                    <option value=''>مدیریت، پشتیبانی، همکاری، فروش</option>

                                    <option value='فروش'>فروش</option>
                                    <option value='همکاری'>همکاری</option>
                                    <option value='پشتیبانی'>پشتیبانی</option>
                                    <option value='مدیریت'>مدیریت</option>
                                </select>
                            </div>
                            <div class="cell medium-12">
                                <textarea style="min-height: 155px" name="text" minlength="20" maxlength="1000"
                                          placeholder="متن پیام"></textarea>
                                @if ($errors->has('text'))
                                    <span class="invalid-feedback">{{ $errors->first('text') }}</span>
                                @endif
                            </div>
                            <div class="cell medium-12">
                                <div class="text-center upload-box" role="button">
                                    <label for="file" style="width: 100%;height: 100%;">
                                    <span class="info">
                                        <i>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2605 22.2483H8.74047C3.83047 22.2483 1.73047 20.1483 1.73047 15.2383V15.1083C1.73047 10.6683 3.48047 8.52832 7.40047 8.15832C7.80047 8.12832 8.18047 8.42832 8.22047 8.83832C8.26047 9.24832 7.96047 9.61832 7.54047 9.65832C4.40047 9.94832 3.23047 11.4283 3.23047 15.1183V15.2483C3.23047 19.3183 4.67047 20.7583 8.74047 20.7583H15.2605C19.3305 20.7583 20.7705 19.3183 20.7705 15.2483V15.1183C20.7705 11.4083 19.5805 9.92832 16.3805 9.65832C15.9705 9.61832 15.6605 9.25832 15.7005 8.84832C15.7405 8.43832 16.0905 8.12832 16.5105 8.16832C20.4905 8.50832 22.2705 10.6583 22.2705 15.1283V15.2583C22.2705 20.1483 20.1705 22.2483 15.2605 22.2483Z"
                                                      fill="currentColor"/>
                                                <path d="M12 15.7511C11.59 15.7511 11.25 15.4111 11.25 15.0011V3.62109C11.25 3.21109 11.59 2.87109 12 2.87109C12.41 2.87109 12.75 3.21109 12.75 3.62109V15.0011C12.75 15.4111 12.41 15.7511 12 15.7511Z"
                                                      fill="currentColor"/>
                                                <path d="M15.3498 6.60141C15.1598 6.60141 14.9698 6.53141 14.8198 6.38141L11.9998 3.56141L9.17984 6.38141C8.88984 6.67141 8.40984 6.67141 8.11984 6.38141C7.82984 6.09141 7.82984 5.61141 8.11984 5.32141L11.4698 1.97141C11.7598 1.68141 12.2398 1.68141 12.5298 1.97141L15.8798 5.32141C16.1698 5.61141 16.1698 6.09141 15.8798 6.38141C15.7398 6.53141 15.5398 6.60141 15.3498 6.60141Z"
                                                      fill="currentColor"/>
                                            </svg>
                                        </i>
                                        <span class="text">آپلود ضمیمه</span>
                                    </span>
                                    </label>
                                    <input type="file" class="d-none" id="file" name="file">
                                </div>
                                <div class="info-file">
                                    حداقل حجم ۲۵MB میباشد. پسوند های مجاز zip - pdf - jpg - jpeg - png
                                </div>
                            </div>
                        </div>

                        <div class="text-left">
                            {{ Form::submit('ارسال پیام', array('class' => 'button add-shop m-0')) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
