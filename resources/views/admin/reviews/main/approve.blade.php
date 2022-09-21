<div class="cell">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>نظرات تایید شده</h4></div>
                <div class="cell medium-6">
                    <div class="float-left">

                    </div>
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th>تاریخ</th>
                    <th>نام محصول</th>
                    <th>کاربر</th>
                    <th>محتوا</th>
                    <th>نمره کل</th>
                    <th>پیشنهاد شده</th>
                    <th>پاسخ</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ratings as $item)
                    <tr>
                        <td>{{$item->created_at}}</td>
                        <td><a target="_blank" href="{{ route('product', $item->reviewrateable2->slug) }}">{{ $item->reviewrateable2->title }}</a></td>
                        <td>{{ $item->author->name }}</td>
                        <td>{{ $item->body }}</td>
                        <td>{{ $item->rating }}</td>
                        <td>
                            @if ($item->recommend == "Yes")
                                <span class="label success">بله</span>
                            @else
                                <span class="label alert">خیر</span>
                            @endif
                        </td>
                        <td>
                            <comment-replay id="{{$item->id}}" replay="{{$item->replay}}"></comment-replay>
                       </td>
                        <td>
                            <ul class="modify">
                                <li><a href="{{route('UnapproveRate', $item->id)}}"><i class="fas fa-times" title="رد دوباره نظر و امتیاز"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Pagination">
            {!! $ratings->links(); !!}
        </nav>
    </div>
</div>
