<div class="cell medium-6 medium-offset-3">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>اطلاعات تماس</h4></div>
                <div class="cell medium-6 date">
                    @if($contactcount < 1)
                        <div class="float-left">
                            <a class="button success tiny" href="{{ route('contactinfo.create') }}"><i class="fas fa-plus"></i></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th width="200">اطلاعات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>تلفن اول</td>
                        <td>{{ $contact->phone1 }}</td>
                    </tr>

                    <tr>
                        <td>تلفن دوم</td>
                        <td>{{ $contact->phone2 }}</td>
                    </tr>

                    <tr>
                        <td>تلفن سوم</td>
                        <td>{{ $contact->phone3 }}</td>
                    </tr>

                    <tr>
                        <td>واتساپ</td>
                        <td>{{ $contact->whatsapp }}</td>
                    </tr>

                    <tr>
                        <td>تلگرام</td>
                        <td>{{ $contact->telegram }}</td>
                    </tr>

                    <tr>
                        <td>ایمیل</td>
                        <td>{{ $contact->email }}</td>
                    </tr>


                    <tr>
                        <td>فکس</td>
                        <td>{{ $contact->fax }}</td>
                    </tr>

                    <tr>
                        <td>آدرس پستی</td>
                        <td>{{ $contact->address }}</td>
                    </tr>

                    <tr>
                        <td>آدرس نقشه گوگل</td>
                        <td>{{ $contact->mapurl }}</td>
                    </tr>

                    <tr>
                        <td>Lat</td>
                        <td>{{ $contact->lat }}</td>
                    </tr>

                    <tr>
                        <td>Long</td>
                        <td>{{ $contact->long }}</td>
                    </tr>

                    <tr>
                        <td>Zoom</td>
                        <td>{{ $contact->zoom }}</td>
                    </tr>
                    <tr>
                        <td>pin نقشه</td>
                        <td><img width="50" src="{{ $contact->mappin }}"></td>
                    </tr>
                    <tr>
                        <td>تصویر</td>
                        <td><img width="50" src="{{ $contact->image }}"></td>
                    </tr>

                    <tr>
                        <td><a href="{{ route('contactinfo.edit', $contact->id) }}" class="button warning">ویرایش</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
