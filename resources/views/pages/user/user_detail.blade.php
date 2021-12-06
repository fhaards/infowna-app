<div id="user-detail-modal" aria-hidden="true"
    class="hidden overflow-x-hidden fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative dark:bg-gray-700 min-w-3xl">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                    User Detail
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="user-detail-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="sm:px-8 px-4 w-full overflow-y-auto max-h-96 h-full">
                <div class="w-full flex justify-center items-center mt-5">
                    <div class="flex w-36 h-36 object-cover bg-gray-100 rounded-xl justify-center items-center detail-photo"></div>
                </div>
                <div class="flex flex-col sm:flex-row py-4 bg-gray-50 border border-gray-100 rounded-lg px-5 mt-5">
                    <label class="w-24 font-medium text-sm text-gray-400">Name</label>
                    <span class="font-medium text-sm text-gray-600 detail-name"></span>
                </div>
                <div class="flex flex-col sm:flex-row py-4 bg-gray-50 border border-gray-100 rounded-lg px-5 mt-5">
                    <label class="w-24 font-medium text-sm text-gray-400">Email</label>
                    <span class="font-medium text-sm text-gray-600 detail-email"></span>
                </div>
                <div class="flex flex-col sm:flex-row justify-between sm:flex-row py-4 bg-gray-50 border border-gray-100 rounded-lg px-5 mt-5">
                    <div class="flex flex-col">
                        <label class="font-medium text-sm text-gray-400">Phone</label>
                        <span class="py-2 font-medium text-sm text-gray-600 detail-phone"></span>
                    </div>
                    <div class="flex flex-col">
                        <label class="sm:w-32 font-medium text-sm text-gray-400">Birth Date</label>
                        <span class="py-2 font-medium text-sm text-gray-600 detail-birth-date"></span>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium text-sm text-gray-400">Birth Place</label>
                        <span class="py-2 font-medium text-sm text-gray-600 detail-birth-place"></span>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row py-4 bg-gray-50 border border-gray-100 rounded-lg px-5 mt-5">
                    <label class="w-24 font-medium text-sm text-gray-400">Address</label>
                    <span class="font-medium text-sm text-gray-600 detail-address"></span>
                </div>
                <div class="flex flex-col sm:flex-row justify-between sm:flex-row py-4 bg-gray-50 border border-gray-100 rounded-lg px-5 mt-5">
                    <div class="flex flex-col">
                        <label class="font-medium text-sm text-gray-400">Country</label>
                        <span class="py-2 font-medium text-sm text-gray-600 detail-country"></span>
                    </div>
                    <div class="flex flex-col">
                        <label class="sm:w-32 font-medium text-sm text-gray-400">Districts</label>
                        <span class="py-2 font-medium text-sm text-gray-600 detail-districts"></span>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium text-sm text-gray-400">Postal Code</label>
                        <span class="py-2 font-medium text-sm text-gray-600 detail-postalcode"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex space-x-2 items-center p-6 bg-gray-50 border border-gray-100 rounded-lg px-5 mt-5 rounded-b dark:border-gray-600">
                {{-- <button data-modal-toggle="user-detail-modal" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                    accept</button>
                <button data-modal-toggle="user-detail-modal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium text-sm px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Decline</button> --}}
            </div>
        </div>
    </div>
</div>
