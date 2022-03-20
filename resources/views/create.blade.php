@extends('layout')

@section('content')
    <main class="max-w-lg mx-auto my-10">
        <br>
        <br>
        <br>
        <h1 class="text-center">Register</h1>
        <form action="/register" method="POST">
            @csrf

            <div>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="name">
                Full Name
            </label>
            <input type="text" 
                    class="border border-gray-400 p-2 w-full"
                    name="name" 
                    id="name"
                    value="{{ old('name') }}"
                    required>
            </div>
            @error("name")
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="email">
                Email Address
            </label>
            <input type="email" 
                    class="border border-gray-400 p-2 w-full"
                    name="email" 
                    id="email"
                    value="{{ old('email') }}"
                    required>
            </div>
            
            @error("email")
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror


            <div>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="username">
                Username
            </label>
            <input type="text" 
                    class="border border-gray-400 p-2 w-full"
                    name="username" 
                    id="username"
                    value="{{ old('username') }}"
                    required>
            </div>
            @error("username")
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="password">
                Password
            </label>
            <input type="password" 
                    class="border border-gray-400 p-2 w-full"
                    name="password" 
                    id="password"
                    value="{{ old('password') }}"
                    required>
            </div>
            @error("password")
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div>
                <button type="submit" class="btn my-3 btn-info">
                    Submit
                </button>
            </div>
        </form>
    </main>
@endsection