<div id="request-change-modal" aria-hidden="true"
    class="hidden overflow-x-hidden fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-lg px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-2xl shadow relative dark:bg-gray-700">
            <form method="post" class="change-status-form">
                @csrf
                @method('PUT')
                <!-- Modal header -->
                <div class="flex items-start justify-between p-8 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                        <span>Change Status</span>
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="request-change-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-8 w-full overflow-y-auto max-h-96 h-full">
                    <p class="">Do you really want to approve this request ?</p>
                    <div class="my-3 py-3">
                        <div class="flex flex-col sm:flex-row gap-1 mb-2 border-b">
                            <input type="hidden" value="" class="change-req-id-input" name="req_id">
                            <input type="hidden" value="" class="change-req-status" name="req_status">
                            <span class="mb-2 w-1/3">Request ID</span>
                            <span class="mb-2 w-2/3 text-gray-800 font-semibold change-req-id"></span>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-1 mb-2 border-b">
                            <span class="mb-2 w-1/3">Name</span>
                            <span class="mb-2 w-2/3 text-gray-800 font-semibold change-req-name"></span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end mb-2 p-8">
                    <button type="submit"
                        class="inline-flex gap-5 px-5 py-3 text-sm font-medium text-white bg-blue-800 hover:bg-blue-900 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2.5 2v6h6M21.5 22v-6h-6" />
                            <path d="M22 11.5A10 10 0 0 0 3.2 7.2M2 12.5a10 10 0 0 0 18.8 4.2" />
                        </svg>
                        <span>Approved</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
