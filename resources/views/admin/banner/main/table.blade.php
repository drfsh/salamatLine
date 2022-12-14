<div class="cell medium-8 medium-offset-2">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>بنر</h4></div>
                <div class="cell medium-6 date">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('banner.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th width="200">تصویر</th>
                    <th width="300">نام</th>
                    <th width="200">جایگاه</th>
                    <th width="200">صفحه</th>
                    <th>فعال </th>
                    <th class="text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $item)
                    <tr>
                        <td><img src="{{$item->tiny}}"></td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->pos}}</td>
                        <td>{{$item->name_page}}</td>
                        <td class="text-center">
                            @if($item->active == true)
                                <span class="label success">فعال</span>
                            @else
                                <span class="label alert">غیر فعال</span>
                            @endif
                        </td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('banner.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                <li class="delete">
                                    {{ Form::open(['route' => ['banner.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این بنر به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
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
            {!! $banners->links(); !!}
        </nav>
    </div>
</div>