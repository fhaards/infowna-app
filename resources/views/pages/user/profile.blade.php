@extends('layouts.app')
@section('content')
    <div class="container mx-auto max-w-7xl sm:pt-0 pt-24">
        <div class="px-4 py-24 mx-auto sm:max-w-4xl flex flex-col">
            @include('components.notif_error')
            @foreach ($user as $u)
                <div
                    class="profile-banner relative w-full shadow-sm border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10">
                        <div class="absolute -top-10  border-4 border-white rounded-full h-24 w-24 mb-3 items-center">
                            @if ($u->photo == null)
                                <div
                                    class="flex items-center justify-content-center w-full h-full bg-white object-cover rounded-full">
                                    <span class="font-bold text-gray-800 text-xs mx-auto"> NO PHOTO </span>
                                </div>
                            @else
                                <img class="rounded-full items-center w-full h-full object-cover"
                                    src="{{ asset("storage/user/avatars/$u->photo") }}" alt="" />
                            @endif
                        </div>

                        <div class="mt-24 flex items-center flex-col">
                            <h3 class="text-xl text-gray-800 font-medium mb-1 dark:text-white">
                                {{ $u->name }}
                            </h3>
                            <span class="flex inline-flex gap-3 items-center text-sm text-gray-600 dark:text-gray-400">
                                {{ $u->email }}
                                @if (Auth::user()->user_status == 0)
                                    <span
                                        class="bg-red-100 border border-red-500 text-red-600 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">
                                        Invalid
                                    </span>
                                @else
                                    <span
                                        class="bg-green-100 border border-green-500 text-green-600 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                        Validated
                                    </span>
                                @endif
                            </span>
                        </div>
                        <div class="flex space-x-3 mt-4 lg:mt-6">
                            <a href="{{ route('user.edit', $u->uuid) }}"
                                class="inline-flex gap-3 text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
