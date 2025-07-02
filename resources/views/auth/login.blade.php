@extends('layouts.auth-app')
@section('title', 'Login')
@section('content')

    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        @if ($errors->any())
            <div class="mb-4">
                <div class="bg-red-100 border border-red-400 text-red-700 rounded relative p-3">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3"
                    required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-3"
                    required>
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
                    Login
                </button>
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <a href="" class="text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                </div>
                <div class="text-sm">
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500">Don't have an account?
                        Register</a>
                </div>
            </div>
        </form>
    </div>
@endsection
