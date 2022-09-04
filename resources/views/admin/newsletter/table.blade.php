<table class="hover">
    <thead>
    <tr>
        <th class="text-center">کد</th>
        <th>ایمیل</th>
        <th>تاریخ</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($emails as $email)
        <tr>
            <td class="text-center">{{ $email->id }}</td>
            <td>{{ $email->email }}</td>
            <td>{{ $email->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
