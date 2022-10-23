<table class="hover">
    <thead>
    <tr>
        <th class="text-center">نام</th>
        <th>موضوع</th>
        <th>متن</th>
        <th>موبایل</th>
        <th>ایمیل</th>
        <th>برای..</th>
        <th>تاریخ</th>
        @if(Auth::user()->hasRole('SuperAdmin'))
            <th>عملیات</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach ($list as $v)
        <tr>
            <td class="text-center">{{ $v->name }}</td>
            <td>{{ $v->title }}</td>
            <td>{{ $v->body }}</td>
            <td>{{ $v->mobile }}</td>
            <td>{{ $v->email }}</td>
            <td>@if($v->type=='contact') تماس با ما @else  سوالات متداول @endif</td>
            <td>{{ $v->created_at }}</td>
            @if(Auth::user()->hasRole('SuperAdmin'))
                <td class="text-center">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['requestContact.destroy', $v->id] ]) !!}
                    <button type="submit" value="Delete" class="delete">
                        <i class="fas fa-trash"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
