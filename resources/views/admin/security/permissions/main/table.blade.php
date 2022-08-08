<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>مجوزها</th>
            <th width="50">عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
        <tr>
            <td>{{ $permission->name }}</td> 
            <td>

                <ul class="modify">
                    <li class="edit">
                        <a class="edit" href="{{ route('permissions.edit', $permission->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </li>
                    <li class="delete">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
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