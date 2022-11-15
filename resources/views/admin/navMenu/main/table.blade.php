<div class="cell medium-4 medium-offset-4">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>منو</h4></div>
                <div class="cell medium-6 date">    
                    <div class="float-left">
                        <a class="button success tiny" href="{{ route('navMenu.create') }}"><i class="fas fa-plus"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>لینک</th>
                    <th>رنگ پس زمینه</th>
                    <th>ایکن</th>
                    <th class="text-center">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->link}}</td>
                        <td style="background: {{$item->color}}"></td>
                        <td><i class="{{$item->icon}}"></i></td>
                        <td>
                            <ul class="modify">
                                <li class="edit"><a href="{{ route('navMenu.edit', $item->id) }}"><i class="fas fa-edit"></i></a></li>
                                <li class="edit"><a target="_blank" href="{{ $item->link }}"><i class="fas fa-eye"></i></a></li>
                                <li class="delete">
                                    {{ Form::open(['route' => ['navMenu.destroy', $item->id], 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این منو به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
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
    </div>
</div>