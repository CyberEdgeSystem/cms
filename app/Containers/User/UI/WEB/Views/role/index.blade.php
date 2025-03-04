@extends('User::layout')
@section('content')
    <h2>Ролі</h2>
    <a href="{{ route('admin.roles.create') }}">Додати роль</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Дозволи</th>
            <th>Дії</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
                <td>
                    <a href="{{ route('admin.roles.edit', $role) }}">Редагувати</a>
                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

