@foreach($paginator as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
        {{ config("user.role.".$user->role_id) }}
        </td>
        <td>
            <input type="checkbox" data-id="{{ $user->id }}" name="active" class="js-switch" {{ $user->active == 0 ? 'checked' : '' }}>
        </td>
        <td class="d-flex row">
            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-success">Sửa</a>
            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="confirm('Bạn có chắc muốn xoá?')">Xoá</button>
            </form>  
        </td>
    </tr>
@endforeach
