<div class="grid-x grid-padding-x">
    <div class="cell medium-10 medium-offset-1">
        <div class="box shadow rounded hover">
            <div class="heading">
                <div class="grid-x">
                    <div class="cell medium-6"><h4>روزهای تعطیل</h4></div>
                    <div class="cell medium-6">    
                        <div class="float-left">
                            
                        </div> 
                    </div>
                </div>
            </div>
            <table class="hover">
                <thead>
                    <tr>
                        <th class="text-center">نام</th>
                        <th class="text-center">روز</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($days as $item)
                        <tr>
                            <td class="text-center">{{$item->title}}</td>
                            <td class="text-center">{{Verta($item->day)->format('l d F Y')}}</td>
                            <td>
                                <ul class="modify">
                                    <li class="edit"><a href="{{ route('holiday.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                    <li class="delete">
                                        {{ Form::open(['route' => ['holiday.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این روز به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
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
                {!! $days->links(); !!}
            </nav>
        </div>
    </div>
</div>