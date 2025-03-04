@extends('User::admin.layout')

@section('content')
    <h2>Редагування дозволу</h2>

    <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
        @csrf @method('PUT')
        <label>Назва:</label>
        <input type="text" name="name" value="{{ $permission->name }}" required>
        <button type="submit">Оновити</button>
    </form>
@endsection

