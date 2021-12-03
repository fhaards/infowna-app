@extends('layouts.app')

@section('content')
<div class="container mx-auto my-0 min-w-screen min-h-screen">
    <div class="px-0 py-16 mx-auto max-w-screen-xl sm:px-6 lg:px-8 ">
        <div class="max-w-lg mx-auto">
            <form method="POST" action="{{ route('register') }}"
                class="bg-white p-8 mt-6 mb-0 rounded-xl sm:shadow-sm sm:border border-gray-200 space-y-4">
                @csrf
                <h4 class="text-lg font-bold text-center py-5 sm:text-xl">
                    <span class="text-blue-500"> Registration </span>
                    your account
                </h4>

                
                <div>
                    <label for="name" class="text-sm font-medium">Name</label>
                    <input type="name" id="name"
                        class="w-full p-4 mt-2 pr-12 text-sm border border-gray-200 rounded-lg @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                        placeholder="Enter Your Name" />

                    @error('name')
                        <span class="invalid-feedback text-red-500 text-xs py-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input type="email" id="email"
                        class="w-full p-4 mt-2 pr-12 text-sm border border-gray-200 rounded-lg @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Enter email" />

                    @error('email')
                        <span class="invalid-feedback text-red-500 text-xs py-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="text-sm font-medium">Password</label>
                    <div class="relative mt-1">
                        <input type="password" id="password"
                            class="w-full p-4 mt-2 pr-12 text-sm border border-gray-200 rounded-lg @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Enter Password" />

                        <span class="absolute inset-y-0 inline-flex items-center right-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>

                    @error('password')
                        <span class="invalid-feedback text-red-500 text-xs py-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="text-sm font-medium">
                        {{ __('Confirm Password') }}
                    </label>
                    <div class="relative mt-1">
                        <input type="password" id="password"
                            class="w-full p-4 mt-2 pr-12 text-sm border border-gray-200 rounded-lg"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password" />

                        <span class="absolute inset-y-0 inline-flex items-center right-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <button type="submit"
                    class="block w-full px-5 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg">
                    {{ __('Register') }}
                </button>

                <p class="text-sm text-center text-gray-500">
                    Already have account?
                    <a class="underline" href="{{ route('login') }}">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</div>

@endsection
