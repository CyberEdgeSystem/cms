@extends('User::admin.layout')

@section('content')
    <h2>Створення дозволу</h2>

    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        <label>Назва:</label>
        <input type="text" name="name" required>
        <button type="submit">Створити</button>
    </form>
@endsection

