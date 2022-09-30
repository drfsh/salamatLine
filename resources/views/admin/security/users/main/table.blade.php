<table class="hover">
    <thead>
        <tr>
            <th class="text-center">کد</th>
            <th class="text-center">نام</th>
            <th class="text-center">موبایل</th>
            <th>ایمیل</th>
            <th>تاریخ عضویت</th>
            <th width="50">عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td class="text-center">{{ $user->id }}</td>
            <td class="text-center">{{ $user->name }}</td>
            <td class="text-center">{{ $user->mobile }}</td>
            <td>{{ $user->email }}</td>
            <td>{{Verta($user->created_at)->format('l %d %B %Y - H:i')}}</td>
            <td>
                <ul class="modify">
                    <li class="edit">
                        <a class="edit" href="{{ route('users.edit', $user->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </li>
                    <li class="delete">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                            <button type="submit" value="Delete" class="delete">
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