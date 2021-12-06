@extends('pages.request.request_form')
@section('request-form')
    @foreach ($requests as $u)
        @if ($u->req_status == 'Waiting')
            @php 
                $rqs = 'yellow'; 
                $rqI = 'Requests must be approved';
            @endphp
        @else
            @php 
                $rqs = 'green'; 
                $rqI = '';
            @endphp
        @endif
        <div
            class="w-full space-y-6 bg-white shadow-md border-t-4 border-{{ $rqs }}-400 rounded-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-2 p-3 text-center text-{{ $rqs }}-500 font-bold text-lg border-b">
                Submitted Form
            </div>
            <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b">
                <div class="mb-2 sm:w-1/3">
                    <label for="name" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Request Number
                    </label>
                    <p class="text-gray-700 font-semibold">{{ $u->req_id }}</p>
                </div>
                <div class="mb-2 sm:w-1/3">
                    <label for="name" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Status
                    </label>
                    <span
                        class="bg-{{ $rqs }}-100 text-{{ $rqs }}-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">
                        {{ $u->req_status }}
                    </span>
                </div>
                <div class="mb-2 sm:w-1/3">
                    <label for="name" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Print
                    </label>
                    <span class="text-xs text-gray-700">
                        {{$rqI}}
                    </span>
                </div>
            </div>
            <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b">
                <div class="mb-2 sm:w-1/3">
                    <label for="name" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Your Name
                    </label>
                    <p class="text-gray-700 font-semibold">{{ $u->name }}</p>
                </div>
            </div>
            <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b">
                <div class="mb-2 sm:w-1/3">
                    <label for="email" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Your email
                    </label>
                    <p class="text-gray-700 font-semibold">{{ $u->email }}</p>
                </div>
                <div class="mb-2 sm:w-1/3">
                    <label for="gender" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Gender
                    </label>
                    <p class="text-gray-700 font-semibold">{{ $u->gender }}</p>
                </div>
                <div class="mb-2 sm:w-1/3">
                    <label for="nationality" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Nationality
                    </label>
                    <p class="text-gray-700 font-semibold">{{ $u->nationality }}</p>
                </div>
            </div>
            <div class="mb-2 flex sm:flex-row flex-col gap-3">
                <div class="mb-2 sm:w-1/3">
                    <label for="phone" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Phone Number
                    </label>
                    <p class="text-gray-700 font-semibold">{{ $u->phone }}</p>
                </div>
                <div class="mb-2 sm:w-2/3">
                    <label for="passport" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                        Passport ID
                    </label>
                    <p class="text-gray-700 font-semibold">{{ $u->passport_id }}</p>
                </div>
            </div>
            <div class="mb-2">
                <label for="address" class="text-sm font-medium text-blue-800 block mb-2 dark:text-gray-300">
                    Address In Indonesia
                </label>
                <p class="text-gray-700 font-semibold">{{ $u->address_indonesia }}</p>
            </div>
        </div>
    @endforeach
@endsection
