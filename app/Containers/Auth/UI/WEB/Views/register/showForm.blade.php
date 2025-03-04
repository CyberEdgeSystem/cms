@extends('Auth::layout')

@section('title', 'Реєстрація')

@section('content')
    <div class="bg-[#fcfcfd] border border-gray-200 rounded-lg px-4 py-2 pb-4 w-80 flex flex-col">
        <h1 class="text-2xl text-center">Реєстрація</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-700">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST" class="space-y-3 flex flex-col">
            @csrf
            <div>
                <label for="name" class="text-sm text-gray-500">Ім'я</label>
                <input class="w-full rounded border border-gray-200 px-2 py-1 focus:outline-none focus:ring focus:border-[#e7ebf0]" type="text" name="name" placeholder="Ім'я" required>
            </div>
            <div>
                <label for="email" class="text-sm text-gray-500">Email</label>
                <input class="w-full rounded border border-gray-200 px-2 py-1 focus:outline-none focus:ring focus:border-[#e7ebf0]" type="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <label for="password" class="text-sm text-gray-500">Пароль</label>
                <input class="w-full rounded border border-gray-200 px-2 py-1 focus:outline-none focus:ring focus:border-[#e7ebf0]" type="password" name="password" placeholder="Пароль" required>
            </div>
            <div>
                <label for="password" class="text-sm text-gray-500">Підтвердіть пароль</label>
                <input class="w-full rounded border border-gray-200 px-2 py-1 focus:outline-none focus:ring focus:border-[#e7ebf0]" type="password" name="password_confirmation" placeholder="Підтвердіть пароль" required>
            </div>

            <button type="submit" class="px-3 py-1 pb-1.5 bg-[#0067c0] rounded text-gray-100">Зареєструватися</button>
        </form>
    </div>
@endsection
