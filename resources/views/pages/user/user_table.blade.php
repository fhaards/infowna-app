@extends('layouts.app')
@section('content')
    <div class="container mx-auto max-w-7xl sm:pt-0 pt-8">
        <div class="px-4 pb-24 mx-auto sm:max-w-4xl flex flex-col">

            <section class="text-center lg:text-left mb-10">
                <div class="mx-auto max-w-screen-xl lg:items-end lg:justify-between lg:flex">
                    <div class="max-w-xl mx-auto lg:ml-0">
                        <h1 class="text-sm font-medium tracking-widest text-yellow-300 uppercase">
                            USER TABLE
                        </h1>
                        <h2 class="mt-2 text-3xl font-bold sm:text-4xl">
                            <span class="text-blue-800">List of User Table</span>
                        </h2>
                    </div>

                    <p class="max-w-xs mx-auto mt-4 text-gray-700 lg:mt-0 lg:mr-0">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi consequatur tempore culpa
                        officiis
                    </p>
                </div>
            </section>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-4 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            <table class="min-w-full" id="table-user">
                                <thead class="bg-blue-900 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Email
                                        </th>
                                        {{-- <th scope="col" class="text-center border border-blue-800 relative px-4 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $us)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-blue-800">
                                            <td
                                                class="uppercase font-bold border border-gray-200 text-sm text-gray-600 hover:text-blue-800 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                <a href="javascript:void(0)" uuid="{{ $us->uuid }}"
                                                    class="detail-user" data-modal-toggle="user-detail-modal">
                                                    {{ $us->uuid }}
                                                </a>
                                            </td>
                                            <td
                                                class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                {{ $us->name }}
                                            </td>
                                            <td
                                                class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                {{ $us->email }}
                                            </td>
                                            {{-- <td
                                                class="border border-gray-200 px-4 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#"
                                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline">Edit</a>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr colspan="3">
                                            <td>
                                                <p class="bg-danger text-white p-1">No User</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="my-2 py-5">
                                {{-- {{ $users->appends(Input::get('req_status'))->links() }} --}}
                                {!! $user->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('modals')
    @include('pages/user/user_detail')
@endpush

@push('js-stacks')
    <script src="{{ asset('js/user-detail.js') }}"></script>
@endpush
