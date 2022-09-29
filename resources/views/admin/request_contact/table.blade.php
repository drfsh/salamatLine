<table class="hover">
    <thead>
    <tr>
        <th class="text-center">نام</th>
        <th>موضوع</th>
        <th>متن</th>
        <th>موبایل</th>
        <th>ایمیل</th>
        <th>تاریخ</th>

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
            <td>{{ $v->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
