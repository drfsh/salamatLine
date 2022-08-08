<div class="cell">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>کوپن‌ها</h4></div>
                <div class="cell medium-6 date">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('coupon.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th width="50" class="text-center">نام کوپن</th>
                        <th width="50" class="text-center">فعال</th>
                        <th width="70" class="text-center">مقدار قیمت یا درصد</th>
                        <th width="50" class="text-center">تعداد استفاده</th>
                    <th width="20" class="text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $item)
                    @if($item->delete == 0)
                        <tr>
                            <td class="text-center">
                                @if ($item->deleted_at)
                                    <s>{{$item->title}}</s>
                                @else
                                    {{$item->title}}
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->active)
                                    <span class="label success">فعال</span>
                                @else
                                    <span class="label alert">غیر فعال</span>
                                @endif
                            </td>

                            <td class="text-center">
                                @if($item->discount_percent)
                                {{$item->discount_percent}}%
                                @else
                                    {{number_format($item->price)}} ریال برای خریدهای بالای {{number_format($item->min_order)}} ریال
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->uses >0)
                                <span class="label secondary">{{$item->uses}}</span>
                                @else
                                0
                                @endif
                            </td>

                            <td>
                                <ul class="modify">
                                    @if ($item->deleted_at)
                                        <li class="delete"><i class="fas fa-ban" style="color: red;"></i></li>
                                    @else
                                        <li class="edit"><a href="{{ route('coupon.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                        <li class="delete">
                                            {{ Form::open(['route' => ['coupon.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این تخفیف به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
                                                <button type="submit" value="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Pagination">
            {!! $coupons->links(); !!}
        </nav>
    </div>
</div>