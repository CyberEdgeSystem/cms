@extends('User::layout')

@section('content')
    <h2>Редагування ролі</h2>

    <form action="{{ route('admin.roles.update', $role) }}" method="POST">
        @csrf @method('PUT')
        <label>Назва:</label>
        <input type="text" name="name" value="{{ $role->name }}" required>

        <label>Дозволи:</label>
        @foreach ($permissions as $permission)
            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
            {{ $permission->name }}
        @endforeach

        <button type="submit">Оновити</button>
    </form>
@endsection
