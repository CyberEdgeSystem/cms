@extends('Auth::layout')

@section('title', 'Авторизація')

@section('content')
    <h1>Логін</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Увійти</button>
    </form>
@endsection