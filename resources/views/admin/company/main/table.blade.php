<div class="cell">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>شرکت‌ها</h4></div>
                <div class="cell medium-6">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('company.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>محتوا</th>
                    <th>تعداد محصول</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{ substr(strip_tags($item->content), 0, 50) }}{{ strlen(strip_tags($item->content)) > 50 ? "..." : "" }}</td>
                        <td>{{ count($item->feature) }}</td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('company.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                <li class="delete">
                                    {{ Form::open(['route' => ['company.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این شرکت به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
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
            {!! $companies->links(); !!}
        </nav>
    </div>
</div>