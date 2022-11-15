<div class="cell medium-">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6">
                    <h4 style="display: initial">بنر</h4>
                    <a href="/img" style="color: #35a3de;font-size: 11px;margin-right: 10px;">راهنمای جایگاه ها</a>
                </div>
                <div class="cell medium-6 date">
                    <div class="float-left">
                        <a class="button success tiny" target="_blank" href="/admin/banner/create?page={{$collection->id}}"><i class="fas fa-plus"></i></a>
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