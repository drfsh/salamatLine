<div class="cell medium-8 medium-offset-2">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>نیم اسلایدر</h4></div>
                <div class="cell medium-6 date">
                    @if($subcount < 2)   
                        <div class="float-left">
                            <a class="button success tiny" href="{{ route('subslider.create') }}"><i class="fas fa-plus"></i></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th width="200">تصویر</th>
                    <th width="400">نام</th>
                    <th class="text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subsliders as $item)
                    <tr>
                        <td><img src="{{$item->tiny}}"></td>
                        <td>{{$item->title}}</td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('subslider.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                {{-- <li class="delete">
                                    {{ Form::open(['route' => ['subslider.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این اسلایدر به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
                                        <button type="submit" value="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </li> --}}
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>