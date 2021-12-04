@extends('pages.user.profile')
@section('profile-content')
    @foreach ($user as $u)
        <form class="w-full flex sm:flex-row flex-col gap-10" method="post" action="{{ route('user.update', $u->uuid) }}">
            @method('PUT')
            @csrf
            <div
                class="w-full space-y-6 bg-white shadow-sm border border-gray-200 rounded-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex sm:flex-row flex-col gap-3">
                    <div class="mb-2 sm:w-1/2">
                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                            Name</label>
                        <input type="name" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $u->name }}" required>
                    </div>
                    <div class="mb-2 sm:w-1/2">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Your
                            email</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $u->email }}" required>
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col gap-3">
                    <div class="mb-2 sm:w-1/3">
                        <label for="phone" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Phone
                            Number</label>
                        <input type="phone" id="phone" name="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $u->phone }}" required>
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="birth_date"
                            class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Birth
                            Date</label>
                        <input type="date" id="birth_date" name="birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $u->birth_date }}" required>
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Birth
                            Place</label>
                        <input type="text" id="email" name="birth_place"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $u->birth_place }}" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="address" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300"> Your
                        Address
                    </label>
                    <textarea id="address" name="address"
                        class="min-h-24 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="" required>{{ $u->address }} </textarea>
                </div>
                <div class="flex sm:flex-row flex-col gap-3">
                    <div class="mb-2 sm:w-1/3">
                        <label for="countries"
                            class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Country</label>
                        <input type="hidden" id="user-have-country" value="{{ $u->country }}">
                        <select name="country" id="user-edit-country"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        </select>
                    </div>

                    <div class="mb-2 sm:w-1/3">
                        <label for="districts"
                            class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Districts</label>
                        <input type="text" id="districts" name="districts"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $u->districts }}" required>
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="postcode" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Postal
                            Code</label>
                        <input type="text" id="postcode" name="postcode"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $u->postcode }}" required>
                    </div>
                </div>
                <div class="flex items-start mb-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
