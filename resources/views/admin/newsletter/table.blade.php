<table class="hover">
    <thead>
    <tr>
        <th class="text-center">کد</th>
        <th>ایمیل</th>
        <th>تاریخ</th>
        @if(Auth::user()->hasRole('SuperAdmin'))
            <th>عملیات</th>
        @endif

    </tr>
    </thead>
    <tbody>
    @foreach ($emails as $email)
        <tr>
            <td class="text-center">{{ $email->id }}</td>
            <td>{{ $email->email }}</td>
            <td>{{ $email->created_at }}</td>
            @if(Auth::user()->hasRole('SuperAdmin'))
                <td class="text-center">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['newsletter.destroy', $email->id] ]) !!}
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
