@extends('layouts.app')
@section('content')
    <div class="container mx-auto max-w-7xl sm:pt-0 pt-24">
        <div class="px-4 py-16 mx-auto sm:max-w-4xl flex flex-col">
            @if (Auth::user()->user_status == 0)
                @include('components.alert_invalid_user')
            @else
                <section class="text-center lg:text-left mb-10">
                    <div class="mx-auto max-w-screen-xl lg:items-end lg:justify-between lg:flex">
                        <div class="max-w-xl mx-auto lg:ml-0">
                            <h1 class="text-sm font-medium tracking-widest text-blue-600 uppercase">
                                Application
                            </h1>
                            <h2 class="mt-2 text-3xl font-bold sm:text-4xl">
                                <span class="text-blue-600">Residence </span> Permit
                            </h2>
                        </div>
                        <p class="max-w-xs mx-auto mt-4 text-gray-700 lg:mt-0 lg:mr-0">
                            After the form is submitted, the admin will check and provide a residence permit
                        </p>
                    </div>
                </section>
                <form class="w-full flex sm:flex-row flex-col gap-10" method="post" action="{{ route('requests.store') }}">
                    <div class="w-full space-y-6 bg-white shadow-sm border border-gray-200 rounded-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="mb-2">
                            Permission Form
                        </div>
                        <div class="mb-2">
                            <label for="address" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                                Address In Indonesia
                            </label>
                            <textarea class="min-h-24 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            id="address" name="address"></textarea>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
