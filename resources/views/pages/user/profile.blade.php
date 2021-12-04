@extends('layouts.app')
@section('content')
    <div class="container mx-auto max-w-7xl sm:pt-0 pt-24">
        <div class="px-4 py-16 mx-auto sm:max-w-4xl flex flex-col">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $message)
                    <div id="alert-2" class="flex gap-3 bg-red-100 rounded-lg p-4 mb-4 items-center text-red-700"
                        role="alert">
                        <i class="font-medium fe fe-alert-circle fe-12"></i>
                        <div class="ml-3 text-sm font-medium text-red-700">
                            {{ $message }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
                            data-collapse-toggle="alert-2" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endforeach
            @endif

            @foreach ($user as $u)
                <div class="profile-banner relative w-full shadow-sm border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10">
                        <div class="absolute -top-10  border-4 border-white rounded-full h-24 w-24 mb-3 items-center">
                            @if ($u->photo == null)
                                <div class="flex items-center justify-content-center w-full h-full bg-white object-cover rounded-full">
                                    <span class="font-bold text-gray-800 text-xs mx-auto"> NO PHOTO </span>
                                </div>
                            @else
                                <img class="rounded-full items-center w-full h-full object-cover"
                                    src="{{ asset("storage/user/avatars/$u->photo") }}" alt="" />
                            @endif
                        </div>

                        <div class="mt-24 flex items-center flex-col">
                            <h3 class="text-xl text-gray-800 font-medium mb-1 dark:text-white"> {{ $u->name }}</h3>
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $u->email }}</span>
                        </div>
                        <div class="flex space-x-3 mt-4 lg:mt-6">
                            <a href="{{ route('user.edit', $u->uuid) }}"
                                class="inline-flex gap-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>
                                Profile Settings
                            </a>
                            <a href="{{ route('edit-photo', $u->uuid) }}"
                                class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 inline-flex items-center text-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">
                                Edit Photo
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    @yield('profile-content')
                </div>
            @endforeach
        </div>
    </div>
@endsection
