@extends('layouts.app')

@section('content')

    <div class=" mx-auto">
        <div class="container px-0 sm:py-16 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
            <div class="max-w-lg mx-auto">
                <form method="POST" action="{{ route('login') }}"
                    class="p-8 mt-6 mb-0 bg-white rounded-xl sm:shadow-sm sm:border border-gray-200 space-y-4">
                    @csrf
                    <div class="flex flex-row justify-center items-center">
                        <svg version="1.1" id="logo" class="h-auto w-auto" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="100">
                            <image href="{{ asset('img/baseapp/logo_djim.svg') }}" height="100" />
                        </svg>
                        <div>
                            <p class="text-xs sm:text-sm font-semibold">DIREKTORAT JENDRAL IMIGRASI </p>
                            <p class="text-xs sm:text-sm">KEMENTRIAN HUKUM DAN HAM REPUBLIK INDONESIA</p>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold text-center py-5 sm:text-xl">
                        <span class="text-blue-800"> Sign in </span>
                        <span class="text-blue-900"> to your account </span>
                    </h4>

                    <div>
                        <label for="email" class="text-sm font-medium">Email</label>
                        <div class="relative mt-1">
                            <input type="email" id="email"
                                class="w-full p-4 pr-12 text-sm focus:ring-blue-800 border border-gray-200 rounded-lg @error('email') is-invalid @enderror"
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
                        <div class="relative mt-1" x-data="{ visible : false , data: '' }">
                            <input type="password" id="password"
                                class="w-full p-4 pr-12 text-sm focus:ring-blue-800 border border-gray-200  rounded-lg @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Enter password"
                                x-show="visible == false" x-model="data" />

                            <input class="w-full p-4 pr-12 text-sm border border-gray-200 rounded-lg"
                                x-show="visible == true" type="text" placeholder="*********" x-model="data">

                            <div @click.prevent="visible = !visible"
                                class="absolute inset-y-0 inline-flex items-center right-4 cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" x-show="visible == true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>

                                <svg class="w-5 h-5 text-gray-500" x-show="visible == false" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                    </path>
                                </svg>
                            </div>
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
                        class="block w-full px-5 py-3 text-sm font-medium text-white bg-blue-800 hover:bg-blue-900 rounded-lg">
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
