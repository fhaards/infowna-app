@extends('layouts.app')
@section('content')
    <div class="container mx-auto max-w-7xl sm:pt-0 pt-8">
        <div class="px-4 pb-24 mx-auto sm:max-w-4xl flex flex-col">
            @include('components.alert_success')
            <section class="text-center lg:text-left mb-10">
                <div class="mx-auto max-w-screen-xl lg:items-end lg:justify-between lg:flex">
                    <div class="max-w-xl mx-auto lg:ml-0">
                        <h1 class="text-xs font-medium tracking-widest text-yellow-300 uppercase">
                            List of Application
                        </h1>
                        <h2 class="mt-2 text-3xl font-bold sm:text-4xl">
                            <span class="text-blue-800">Residence Permit</span>
                        </h2>
                    </div>
                </div>
            </section>



            <div class="flex flex-col">
                <div class="w-full mb-5 py-2 border-t border-b border-gray-200">
                    @include('pages/request/request_filter')
                </div>
                <div class="overflow-x-auto ">
                    @if ($requests->isEmpty())
                        <p class="bg-danger text-center p-1">Data Requests is empty</p>
                    @else

                        <div class="py-2 inline-block min-w-full">
                            <div class="overflow-hidden sm:rounded-lg">
                                <table class="min-w-full" id="table-request">
                                    <thead class="bg-blue-900 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-2 py-2 text-left uppercase tracking-wider dark:text-gray-400">
                                                ID
                                            </th>
                                            <th scope="col"
                                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-2 py-2 text-left uppercase tracking-wider dark:text-gray-400">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-2 py-2 text-left uppercase tracking-wider dark:text-gray-400">
                                                Email
                                            </th>
                                            <th scope="col"
                                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-2 py-2 text-left uppercase tracking-wider dark:text-gray-400">
                                                Date
                                            </th>
                                            <th scope="col"
                                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-2 py-2 text-left uppercase tracking-wider dark:text-gray-400">
                                                Status
                                            </th>
                                            <th scope="col" class="text-center border border-blue-800 relative px-2 py-2">
                                                <span class="sr-only">Action</span>
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
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-blue-800">
                                                <td
                                                    class="uppercase font-bold border border-gray-200 text-xs text-gray-600 hover:text-blue-800 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                    <a href="javascript:void(0)" reqid="{{ $req->req_id }}"
                                                        class="detail-request" data-modal-toggle="request-detail-modal">
                                                        {{ $req->req_id }}
                                                    </a>
                                                </td>
                                                <td
                                                    class="border border-gray-200 text-xs text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                    {{ $req->name }}
                                                </td>
                                                <td
                                                    class="border border-gray-200 text-xs text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                    {{ $req->email }}
                                                </td>
                                                <td
                                                    class="border border-gray-200 text-xs text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                    {{ date('d/m/Y - H:i', strtotime($req->created_at)) }}
                                                </td>
                                                <td
                                                    class="border border-gray-200 text-xs text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                    <span
                                                        class="bg-{{ $rqs }}-100 text-{{ $rqs }}-800  text-center text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">
                                                        {{ $req->req_status }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="border border-gray-200 text-xs text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                                    <div class="inline-flex justify-between gap-1">
                                                        <a href="javascript:void(0)" reqid="{{ $req->req_id }}"
                                                            data-modal-toggle="request-change-modal"
                                                            class="change-request bg-blue-500 hover:bg-blue-600 inline-flex items-center justify-center text-xs p-1.5 rounded-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                                viewBox="0 0 24 24" fill="none" stroke="#ffffff"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path d="M2.5 2v6h6M21.5 22v-6h-6" />
                                                                <path
                                                                    d="M22 11.5A10 10 0 0 0 3.2 7.2M2 12.5a10 10 0 0 0 18.8 4.2" />
                                                            </svg>
                                                        </a>
                                                        @if ($req->req_status == 'Approved')


                                                            <a target="_blank"
                                                                href="{{ route('print-requests', $req->req_id) }}"
                                                                class="bg-blue-800 hover:bg-blue-900 inline-flex items-center justify-center text-xs  p-1.5 rounded-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="12" viewBox="0 0 24 24" fill="none"
                                                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                                    <path
                                                                        d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                                                    </path>
                                                                    <rect x="6" y="14" width="12" height="8"></rect>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                                {{-- <td
                                                class="border border-gray-200 px-4 py-2 whitespace-nowrap text-right text-xs font-medium">
   
                                            </td> --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    @endif
                </div>
                <div class="my-2 py-5">
                    {{-- {{!! $requests->appends(Input::get('req_status'))->links() !!}} --}}
                    {{-- {{ $post->appends($request->only('posted_type')) }} --}}
                    {{-- {!! $requests->links() !!} --}}
                    @if (!empty($urlquery['req_status']))
                        {!! $requests->appends(Request::except('page'))->render() !!}
                    @else
                        {!! $requests->appends(Request::except('page', 'req_status'))->render() !!}
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('pages/request/request_detail')
    @include('pages/request/request_change_status')
@endpush

@push('js-stacks')

    <script src="{{ asset('js/requests-detail.js') }}"></script>
    <script src="{{ asset('js/requests-change.js') }}"></script>
@endpush
