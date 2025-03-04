@extends('User::layout')

@section('content')
    <h2>Створення ролі</h2>

    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <label>Назва:</label>
        <input type="text" name="name" required>

        <label>Дозволи:</label>
        @foreach ($permissions as $permission)
            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
            {{ $permission->name }}
        @endforeach

        <button type="submit">Створити</button>
    </form>
@endsection

