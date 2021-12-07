@extends('layouts.app')

@section('content')

    <div class="container mx-auto max-w-4xl">
        <div class="px-8 mx-auto max-w-screen-xl">
            <div
                class="flex flex-col sm:flex-row justify-between gap-8 items-center rounded-3xl sm:border border-gray-200 p-8 mb-5">
                <!-- hero text -->
                <div class="hero-text ">
                    <p class="text-blue-800">
                        Hello, {{ Auth::user()->name }}
                    </p>
                    <h3 class=" font-bold text-2xl text-blue-900 leading-tight">
                        Welcome Back,
                    </h3>
                    <hr class="w-12 h-1 bg-yellow-400 rounded-full mt-8">
                    <p class="text-gray-800 text-base leading-relaxed mt-8 font-semibold">
                        Residence Permit Application {{ __('Dashboard') }}
                    </p>
                </div>

                <!-- hero image -->
                <div class="hero-image ">
                    <svg version="1.1" id="logo" class="w-48 h-auto sm:w-96 sm:h-56 p-0" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="100%">
                        <image href="{{ asset('img/baseapp/hero-2.svg') }}" width="100%" />
                    </svg>
                </div>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            @if (Auth::user()->user_group == 'admin')
                @include('home_count')
            @else
                
            @endif

        </div>
    </div>
@endsection
