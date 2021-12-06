@extends('layouts.app')
@section('content')
    <div class="container mx-auto max-w-7xl sm:pt-0 pt-24">
        <div class="px-4 py-16 mx-auto sm:max-w-4xl flex flex-col">

            <section class="text-center lg:text-left mb-10">
                <div class="mx-auto max-w-screen-xl lg:items-end lg:justify-between lg:flex">
                    <div class="max-w-xl mx-auto lg:ml-0">
                        <h1 class="text-sm font-medium tracking-widest text-blue-600 uppercase">
                            List of Application
                        </h1>
                        <h2 class="mt-2 text-3xl font-bold sm:text-4xl">
                            <span class="text-blue-600">Residence </span> Permit
                        </h2>
                    </div>
                </div>
            </section>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-4 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            <table class="min-w-full" id="table-request">
                                <thead class="bg-gray-600 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="text-center border border-gray-700 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="text-center border border-gray-700 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="text-center border border-gray-700 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="text-center border border-gray-700 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Date
                                        </th>
                                        <th scope="col"
                                            class="text-center border border-gray-700 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Status
                                        </th>
                                        <th scope="col" class="text-center border border-gray-700 relative px-4 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $req)
                                        @if ($req->req_status == 'Waiting')
                                            @php $rqs = 'yellow'; @endphp
                                        @else
                                            @php $rqs = 'green'; @endphp
                                        @endif
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="uppercase font-bold border border-gray-200 text-sm text-gray-600 hover:text-blue-800 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                <a href="javascript:void(0)" reqid="{{ $req->req_id }}"
                                                    class="detail-request" data-modal-toggle="request-detail-modal">
                                                    {{ $req->req_id }}
                                                </a>
                                            </td>
                                            <td
                                                class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                {{ $req->name }}
                                            </td>
                                            <td
                                                class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                {{ $req->email }}
                                            </td>
                                            <td
                                                class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                {{ date('d/m/Y - H:i', strtotime($req->created_at)) }}
                                            </td>
                                            <td
                                                class="text-center border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                <span
                                                    class="bg-yellow-100 text-{{ $rqs }}-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">
                                                    {{ $req->req_status }}
                                                </span>
                                            </td>
                                            <td
                                                class="border border-gray-200 px-4 py-2 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#"
                                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="my-2 py-5">
                                {!! $requests->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('pages/request/request_detail')
@endpush

@push('js-stacks')
    <script src="{{ asset('js/requests-detail.js') }}"></script>
@endpush
