<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>نقش</th>
            <th>مجوزها</th>
            <th width="50">عملیات</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($roles as $role)
        <tr>

            <td>{{ $role->name }}</td>

            <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
            <td>
                <ul class="modify">
                    <li class="edit">
                       <a class="edit" href="{{ URL::to('admin/roles/'.$role->id.'/edit') }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </li>
                    <li class="delete">
                      {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
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