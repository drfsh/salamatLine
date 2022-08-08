<div class="cell">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>محصولات</h4></div>
                <div class="cell medium-6">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('product.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th width="50">تصویر</th>
                    <th>نام</th>
                    <th>ادامه نام</th>
                    <th>قیمت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td class="text-center">{{$item->id}}</td>
                        <td><img src="{{$item->tiny}}" alt="" width="50"></td>
                        <td><a href="{{ route('product', $item->slug) }}" target="_blank">{{ $item->title }}</a></td>
                        <td>{{$item->subtitle}}</td>
                        <td>{!! $item->showing_price !!}</td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('product.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                <li class="delete">
                                    {{ Form::open(['route' => ['product.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این محصول به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
                                        <button type="submit" value="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Pagination">
            {!! $products->links(); !!}
        </nav>
    </div>
</div>