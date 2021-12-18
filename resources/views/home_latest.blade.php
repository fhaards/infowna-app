<div class="flex flex-col lg:flex-row lg:justify-between lg:gap-8">
    {{-- LASTEST USER --}}
    <div class="flex flex-col lg:w-6/12">
        <section class="text-center lg:text-left py-3">
            <div class="mx-auto max-w-screen-xl lg:items-end lg:justify-between lg:flex">
                <div class="max-w-full w-full mx-auto lg:ml-0 inline-flex justify-between">
                    <h1 class="text-sm font-medium text-blue-800 tracking-wide">
                        Lastest 5 Registered Users
                    </h1>
                    <a href="{{ route('user.index') }}" class="text-gray-500 text-sm font-medium">
                        Show All Users >
                    </a>
                </div>
            </div>
        </section>
        @if ($user->isEmpty())
            <p class="text-gray-500 text-center p-1 border-t border-b text-sm">- Data Users is empty</p>
        @else
            <div class="overflow-x-auto max-w-6/12">
                <table class="min-w-full" id="table-user">
                    <thead class="bg-blue-900 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col"
                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Join Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $us)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-blue-800">
                                <td
                                    class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                    {!! substr(strip_tags($us->name), 0, 25) !!}
                                </td>
                                <td
                                    class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                    {{ date('d/m/Y - H:i', strtotime($us->created_at)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    {{-- LATEST REQUESTS --}}
    <div class="flex flex-col lg:w-6/12">
        <section class="text-center lg:text-left py-3">
            <div class="mx-auto max-w-screen-xl lg:items-end lg:justify-between lg:flex">
                <div class="max-w-full w-full mx-auto lg:ml-0 inline-flex justify-between">
                    <h1 class="text-sm font-medium text-blue-800 tracking-wide">
                        Lastest 5 Requests
                    </h1>
                    <a href="{{ route('requests.index') }}" class="text-gray-500 text-sm font-medium">
                        Show All Requests >
                    </a>
                </div>
            </div>
        </section>
        @if ($requests->isEmpty())
            <p class="text-gray-500 text-center p-1 border-t border-b text-sm">- Data Requests is empty</p>
        @else
            <div class="overflow-x-auto max-w-6/12">
                <table class="min-w-full" id="table-user">
                    <thead class="bg-blue-900 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col"
                                class="text-center border border-blue-800 text-xs font-medium text-gray-50 px-4 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Join Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $req)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-blue-800">
                                <td
                                    class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                    {!! substr(strip_tags($req->name), 0, 25) !!}
                                </td>
                                <td
                                    class="border border-gray-200 text-sm text-gray-500 px-4 py-2 whitespace-nowrap dark:text-gray-400">
                                    {{ date('d/m/Y - H:i', strtotime($req->created_at)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
