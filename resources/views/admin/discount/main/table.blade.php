<div class="cell">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>تخفیفات</h4></div>
                <div class="cell medium-6 date">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('discount.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
{{--                     <th width="10" class="text-center">نام تخفیف</th> --}}
                    <th width="70" class="text-center">نام محصول</th>
                    <th width="50" class="text-center">مقدار تخفیف</th>
                    <th width="70" class="text-center">درصد تخفیف</th>
                    <th width="70" class="text-center">قیمت اصلی/ جدید</th>
                    <th width="50" class="text-center">وضعیت</th>
                    <th width="20" class="text-center">حداکثر تعداد استفاده</th>
                    <th width="20" class="text-center">تعداد استفاده شده</th>
                    <th width="30" class="text-center">تاریخ ایجاد</th>
                    <th width="30" class="text-center">تاریخ شروع</th>
                    <th width="30" class="text-center">تاریخ پایان</th>
                    <th width="20" class="text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $item)
                    <tr class="text-center">
      {{--                   <td>
                            @if ($item->deleted_at)
                                <s>{{$item->title}}</s>
                            @else
                                {{$item->title}}
                            @endif
                        </td> --}}
                        <td>
                            <a href="{{ route('product.edit',$item->product->id)}}" target="_blank">
                                {{$item->product->title}}
                                @if($item->price_id)
                                    <span class="label">{{$item->multiprice->title}}</span>
                                @endif
                                @if($item->feature_id)
                                    <span class="label">{{$item->multifeature->title}}</span>
                                @endif
                            </a>
                        </td>
                        <td>
                            {{number_format($item->price/10)}} تومان
                        </td>
                        <td><span class="label alert">{{$item->percent}}</span></td>
                        <td>
                            @if($item->price_id)
                                <span class="old">{{number_format($item->multiprice->price/10)}}</span> / {{number_format(($item->multiprice->price - $item->price)/10)}}
                            @else
                                <span class="old">{{number_format($item->product->price/10)}}</span> / {{number_format(($item->product->price - $item->price)/10)}}
                            @endif
                        </td>
                        
                        <td>
                            @if($item->active == false)
                                <span class="label alert">غیرفعال</span>

                            @elseif($item->active && $item->uses >= $item->max_uses)
                                <span class="label warning">در حال استفاده</span>  
                            @else
                                <span class="label success">فعال</span>
                            @endif
                        </td>
                        <td>
                            {{$item->max_uses}}
                        </td>
                        <td>
                            <b>{{$item->uses}}</b>
                        </td>
                        <td><small>{{$item->created_at}}</small></td>

                        <td><span>{{$item->start_date}}</span></td>
                        <td><span>{{$item->end_date}}</span></td>
                        <td>
                            <ul class="modify">
                                @if ($item->deleted_at)
                                    <li class="delete"><i class="fas fa-ban" style="color: red;"></i></li>
                                @else
                                    <li><a href="{{ route('product',$item->product->slug)}}" target="_blank"><i class="fas fa-eye"></i></a></li>
                                    <li class="edit"><a href="{{ route('discount.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                    <li class="delete">
                                        {{ Form::open(['route' => ['discount.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این تخفیف به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
                                            <button type="submit" value="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        {!! Form::close() !!}
                                    </li>  
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Pagination">
            {!! $discounts->links(); !!}
        </nav>
    </div>
</div>