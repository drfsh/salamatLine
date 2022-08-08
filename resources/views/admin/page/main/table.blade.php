<div class="cell medium-8 medium-offset-2">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>صفحه</h4></div>
                <div class="cell medium-6 date">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('page.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th width="400">نام</th>
                    <th>فعال </th>
                    <th class="text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $item)
                    <tr>
                        <td><a href="{{ route('singlepage', $item->slug) }}" target="_blank">{{$item->title}}</a></td>
                        <td class="text-center">
                            @if($item->active == true)
                                <span class="label success">فعال</span>
                            @else
                                <span class="label alert">غیر فعال</span>
                            @endif
                        </td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('page.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                <li class="delete">
                                    {{ Form::open(['route' => ['page.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این صفحه به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
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
            {!! $pages->links(); !!}
        </nav>
    </div>
</div>