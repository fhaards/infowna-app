@extends('layouts.app')

@section('content')
    <div class="container mx-auto sm:bg-gradient-to-r from-blue-400 to-blue-50 min-h-screen ">
        <div class="px-0 py-16 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
            <div class="max-w-lg mx-auto">
                <form method="POST" action="{{ route('login') }}" class="p-8 mt-6 mb-0 bg-white rounded-xl sm:shadow-2xl space-y-4">
                    @csrf
                    <h4 class="text-lg font-bold text-center py-5 sm:text-xl">
                        <span class="text-blue-500"> Sign in </span>
                        to your account
                    </h4>

                    <div>
                        <label for="email" class="text-sm font-medium">Email</label>
                        <div class="relative mt-1">
                            <input type="email" id="email"
                                class="w-full p-4 pr-12 text-sm border border-gray-200 rounded-lg @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Enter email" />

                            <span class="absolute inset-y-0 inline-flex items-center right-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </span>
                        </div>

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
                                class="w-full p-4 pr-12 text-sm border border-gray-200 rounded-lg @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Enter password" />

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

                    @if (Route::has('password.request'))
                        <div>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif

                    <button type="submit"
                        class="block w-full px-5 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg">
                        Sign in
                    </button>

                    <p class="text-sm text-center text-gray-500">
                        No account?
                        <a class="underline" href="{{ route('register') }}">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div> --}}
@endsection
