@extends('pages.user.profile')
@section('profile-content')
    @foreach ($user as $u)
        @if (Auth::user()->user_status == 0)
            <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700 dark:bg-yellow-200 dark:text-yellow-800"
                role="alert">
                <svg class="w-5 h-5 inline flex-shrink-0 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium"> Warning ! </span> Please complete your personal information .
                </div>
            </div>
        @endif

        <form class="w-full flex sm:flex-row flex-col gap-10" method="post" action="{{ route('user.update', $u->uuid) }}">
            @method('PUT')
            @csrf
            <div
                class="w-full space-y-6 bg-white shadow-sm border border-gray-200 rounded-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex sm:flex-row flex-col gap-3">
                    <div class="mb-2 sm:w-1/3">
                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                            Name
                        </label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            value="{{ $u->name }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Your email
                        </label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            value="{{ $u->email }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Gender
                        </label>
                        <select name="gender" id="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col gap-3">
                    <div class="mb-2 sm:w-1/3">
                        <label for="phone" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Phone Number
                        </label>
                        <input type="text" id="phone" name="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            value="{{ $u->phone }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="birth_date" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Birth Date
                        </label>
                        <input type="date" id="birth_date" name="birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            value="{{ $u->birth_date }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Birth Place
                        </label>
                        <input type="text" id="email" name="birth_place"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            value="{{ $u->birth_place }}">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="address" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300"> Your
                        Address
                    </label>
                    <textarea id="address" name="address"
                        class="min-h-24 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                        value="">{{ $u->address }} </textarea>
                </div>
                <div class="flex sm:flex-row flex-col gap-3">
                    <div class="mb-2 sm:w-1/3">
                        <label for="countries" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Country
                        </label>
                        <input type="hidden" id="user-have-country" value="{{ $u->country }}">
                        <select name="country" id="user-edit-country"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800">

                        </select>
                    </div>

                    <div class="mb-2 sm:w-1/3">
                        <label for="districts" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Districts
                        </label>
                        <input type="text" id="districts" name="districts"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            value="{{ $u->districts }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="postcode" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Postal Code
                        </label>
                        <input type="text" id="postcode" name="postcode"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            value="{{ $u->postcode }}">
                    </div>
                </div>
                <div class="flex items-start justify-end mb-2">
                    <button type="submit"
                        class="inline-flex gap-5 px-5 py-3 text-sm font-medium text-white bg-blue-800 hover:bg-blue-900 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h13M12 5l7 7-7 7" />
                        </svg>
                        Save
                    </button>
                </div>
            </div>
        </form>
    @endforeach
@endsection

@push('js-stacks')
    <script src="{{ asset('js/user.js') }}"></script>
@endpush
