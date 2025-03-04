
@extends('User::layout')

@section('content')
    <h2>Редагування користувача: {{ $user->name }}</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf @method('PUT')

        <label>Ролі:</label>
        @foreach ($roles as $role)
            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                {{ $user->roles->contains('id', $role->id) ? 'checked' : '' }}>
            {{ $role->name }}
        @endforeach

        <button type="submit">Зберегти</button>
    </form>
@endsection
