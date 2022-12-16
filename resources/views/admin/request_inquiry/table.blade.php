<table class="hover">
    <thead>
    <tr>
        <th>نام ارگان یا سازمان</th>
        <th>نام و نام خانوادگی</th>
        <th>ایمیل</th>
        <th>شماره</th>
        <th>نام محصول</th>
        <th>تاریخ</th>
        <th>تعداد </th>
        @if(Auth::user()->hasRole('SuperAdmin'))
            <th>عملیات</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach ($list as $v)
        <tr>
            <td>{{ $v->office }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->mobile }}</td>
            <td>{{ $v->products }}</td>
            <td>{{ $v->count }}</td>
            <td>{{ $v->created_at }}</td>

            @if(Auth::user()->hasRole('SuperAdmin'))
                <td class="text-center">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['inquirySale.destroy', $v->id] ]) !!}
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
