@extends('User::admin.layout')

@section('content')
    <h2>Дозволи</h2>
    <a href="{{ route('admin.permissions.create') }}">Додати дозвіл</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Дії</th>
        </tr>
        @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                    <a href="{{ route('admin.permissions.edit', $permission) }}">Редагувати</a>
                    <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
