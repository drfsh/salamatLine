<div class="cell">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>کشورهای سازنده</h4></div>
                <div class="cell medium-6">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('country.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th width="50"></th>
                    <th>نام</th>
                    <th>محتوا</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $item)
                    <tr>
                        <td>
                            @if($item->image)
                                <img src="{{$item->image}}" width="50">
                            @endif
                        </td>
                        <td><a href="{{ route('country',$item->slug) }}" target="_blank">{{$item->title}}</a></td>
                        <td>{{ substr(strip_tags($item->content), 0, 50) }}{{ strlen(strip_tags($item->content)) > 50 ? "..." : "" }}</td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('country.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                <li class="delete">
                                    {{ Form::open(['route' => ['country.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این کشور سازنده به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
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
            {!! $countries->links(); !!}
        </nav>
    </div>
</div>