@extends('User::layout')

@section('content')
    <h2>Користувачі</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Роль</th>
            <th>Дії</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}">Редагувати</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
