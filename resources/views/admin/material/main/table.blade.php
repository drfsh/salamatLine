<div class="cell">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>جنس</h4></div>
                <div class="cell medium-6">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('material.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>محتوا</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{ substr(strip_tags($item->content), 0, 50) }}{{ strlen(strip_tags($item->content)) > 50 ? "..." : "" }}</td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('material.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                <li class="delete">
                                    {{ Form::open(['route' => ['material.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این برند به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
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
            {!! $materials->links(); !!}
        </nav>
    </div>
</div>