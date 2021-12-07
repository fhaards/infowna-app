@extends('layouts.app')
@section('content')
    <div class="container mx-auto max-w-7xl sm:pt-0 pt-8">
        <div class="inner-content px-4 pb-24  mx-auto sm:max-w-4xl flex flex-col">
            @if (Auth::user()->user_status == 0)
                @include('components.alert_invalid_user')
            @else
                <section class="text-center lg:text-left mb-10">
                    <div class="mx-auto max-w-screen-xl lg:items-end lg:justify-between lg:flex">
                        <div class="max-w-xl mx-auto lg:ml-0">
                            <h1 class="text-sm font-medium tracking-widest text-yellow-300 uppercase">
                                Application
                            </h1>
                            <h2 class="mt-2 text-3xl font-bold sm:text-4xl">
                                <span class="text-blue-800">Residence Permit</span> 
                            </h2>
                        </div>
                        <p class="max-w-xs mx-auto mt-4 text-gray-700 lg:mt-0 lg:mr-0">
                            After the form is submitted, the admin will check and provide a residence permit
                        </p>
                    </div>
                </section>

                @include('components.alert_success')
                @yield('request-form')
            @endif
        </div>
    </div>
@endsection
