<div class="cell medium-4 medium-offset-4">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>شهر</h4></div>
                <div class="cell medium-6 date">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('city.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th>شهر</th>
                    <th>استان</th>
                    <th class="text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->province->title}}</td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('city.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                <li class="delete">
                                    {{ Form::open(['route' => ['city.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این شهر به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
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
            {!! $cities->links(); !!}
        </nav>
    </div>
</div>