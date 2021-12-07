@extends('pages.request.request_form')
@section('request-form')
    <form class="w-full flex flex-col gap-10" method="post" action="{{ route('requests.store') }}" enctype="multipart/form-data">
        @csrf
        @foreach ($user as $u)
            <input type="hidden" name="uuid" value="{{ $u->uuid }}">
            <div
                class="w-full space-y-6 bg-white shadow-sm border border-gray-200 rounded-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="mb-2 p-3 text-center text-gray-600 font-bold text-lg border-b border-gray-600">
                    Permit Form
                </div>
                <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b">
                    <div class="mb-2 sm:w-1/3">
                        <label for="name" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                            Your Name
                        </label>
                        <p class="text-gray-700 font-semibold">{{ $u->name }}</p>
                        <input type="hidden" name="name" value="{{ $u->name }}">
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b">
                    <div class="mb-2 sm:w-1/3">
                        <label for="email" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                            Your email
                        </label>
                        <p class="text-gray-700 font-semibold">{{ $u->email }}</p>
                        <input type="hidden" id="email" name="email" value="{{ $u->email }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="gender" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                            Gender
                        </label>
                        <p class="text-gray-700 font-semibold">{{ $u->gender }}</p>
                        <input type="hidden" id="gender" name="gender" value="{{ $u->gender }}">
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="nationality" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                            Nationality
                        </label>
                        <p class="text-gray-700 font-semibold">{{ $u->country }}</p>
                        <input type="hidden" name="nationality" value="{{ $u->country }}">
                    </div>
                </div>
                <div class="mb-2 flex sm:flex-row flex-col gap-3">
                    <div class="mb-2 sm:w-1/3">
                        <label for="phone" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                            Phone Number
                        </label>
                        <input type="text"
                            class="@error('phone') is-invalid border-red-500 @enderror bg-gray-50 border border-gray-300  sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            id="phone" name="phone" value="{{ $u->phone }}">

                        @error('phone')
                            <div class="alert alert-danger text-red-500 text-xs py-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2 sm:w-2/3">
                        <label for="passport" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                            Passport ID
                        </label>
                        <input type="text"
                            class="@error('passport_id') is-invalid border-red-500 @enderror min-h-24 bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            id="passport_id" name="passport_id" placeholder="Input your Passport ID or Number">
                        @error('passport_id')
                            <div class="alert alert-danger text-red-500 text-xs py-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <label class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300" for="passport-img">
                        Passport Image
                    </label>
                    <input
                        class="block w-full cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:border-transparent text-sm rounded-lg
                        @error('file') is-invalid border-red-500 @enderror"
                        aria-describedby="file" id="file" name="file" type="file">
                    <div class="mt-1 text-sm text-gray-500" id="file">
                        Scan Passport
                    </div>
                    @error('file')
                        <div class="alert alert-danger text-red-500 text-xs py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="address" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Address In Indonesia
                    </label>
                    <textarea
                        class="@error('address') is-invalid @enderror min-h-24 bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                        id="address" name="address"></textarea>
                    @error('address')
                        <div class="alert alert-danger text-red-500 text-xs py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex items-start justify-end mb-2">
                    <button type="submit"
                        class="inline-flex gap-5 px-5 py-3 text-sm font-medium text-white bg-blue-800 hover:bg-blue-900 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h13M12 5l7 7-7 7" />
                        </svg>
                        Submit
                    </button>
                </div>
            </div>
        @endforeach
    </form>
@endsection
