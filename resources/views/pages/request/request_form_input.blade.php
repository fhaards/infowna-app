@extends('pages.request.request_form')
@section('request-form')
    <form class="w-full flex flex-col gap-10" method="post" action="{{ route('requests.store') }}">
        @csrf
        @foreach ($user as $u)
            <input type="hidden" name="uuid" value="{{ $u->uuid }}">
            <div class="w-full space-y-6 bg-white shadow-sm border border-gray-200 rounded-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="mb-2 p-3 text-center text-blue-600 font-bold text-lg border-b border-blue-600">
                    Permit Form
                </div>
                <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b">
                    <div class="mb-2 sm:w-1/3">
                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Your Name
                        </label>
                        <p class="text-gray-800 font-semibold">{{ $u->name }}</p>
                        <input type="hidden" name="name" value="{{ $u->name }}">
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b">
                    <div class="mb-2 sm:w-1/3">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Your email
                        </label>
                        <p class="text-gray-800 font-semibold">{{ $u->email }}</p>
                        <input type="hidden" id="email" name="email" value="{{ $u->email }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="gender" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Gender
                        </label>
                        <p class="text-gray-800 font-semibold">{{ $u->gender }}</p>
                        <input type="hidden" id="gender" name="gender" value="{{ $u->gender }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="nationality" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Nationality
                        </label>
                        <p class="text-gray-800 font-semibold">{{ $u->country }}</p>
                        <input type="hidden" name="nationality" value="{{ $u->country }}">
                    </div>
                </div>
                <div class="mb-2 flex sm:flex-row flex-col gap-3">
                    <div class="mb-2 sm:w-1/3">
                        <label for="phone" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Phone Number
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="phone" name="phone" value="{{ $u->phone }}">
                    </div>
                    <div class="mb-2 sm:w-2/3">
                        <label for="passport" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                            Passport ID
                        </label>
                        <input type="text"
                            class="min-h-24 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="address" name="passport_id" placeholder="Input your Passport ID or Number">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="address" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">
                        Address In Indonesia
                    </label>
                    <textarea
                        class="min-h-24 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="address" name="address"></textarea>
                </div>
                <div class="flex items-start mb-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save
                    </button>
                </div>
            </div>
        @endforeach
    </form>
@endsection
