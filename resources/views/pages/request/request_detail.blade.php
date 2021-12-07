<div id="request-detail-modal" aria-hidden="true"
    class="hidden overflow-x-hidden fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-2xl shadow relative dark:bg-gray-700 min-w-3xl">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-8 border-b rounded-t dark:border-gray-600">
                <h3 class="text-blue-900 text-xl lg:text-2xl font-semibold dark:text-white">
                    <span>Request Detail</span>
                    
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-blue-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="request-detail-modal">
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
                <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b mb-2 mt-2">
                    <div class="mb-2 sm:w-2/3">
                        <label for="name" class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                            Request Number
                        </label>
                        <p class="text-gray-600 font-semibold detail-reqid"></p>
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="name" class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                            Status
                        </label>
                        <div class="detail-status"></div>
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b mb-2">
                    <div class="mb-2 sm:w-1/3">
                        <label for="name" class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                            Name
                        </label>
                        <p class="text-gray-600 font-semibold detail-name"></p>
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col gap-3 pb-4 border-b mb-2">
                    <div class="mb-2 sm:w-1/3">
                        <label for="email" class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                            Email
                        </label>
                        <p class="text-gray-600 font-semibold detail-email"></p>
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="gender" class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                            Gender
                        </label>
                        <p class="text-gray-600 font-semibold detail-gender"></p>
                    </div>
                    <div class="mb-2 sm:w-1/3">
                        <label for="nationality"
                            class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                            Nationality
                        </label>
                        <p class="text-gray-600 font-semibold detail-nationality"></p>
                    </div>
                </div>
                <div class="mb-2 flex sm:flex-row flex-col gap-3 mb-2">
                    <div class="mb-2 sm:w-1/3">
                        <label for="phone" class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                            Phone Number
                        </label>
                        <p class="text-gray-600 font-semibold detail-phone"></p>
                    </div>
                    <div class="mb-2 sm:w-2/3">
                        <label for="passport" class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                            Passport ID
                        </label>
                        <p class="text-gray-600 font-semibold detail-passport"></p>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="flex flex-row items-center justify-center py-5">
                        <div class="w-48 sm:w-5/12 rounded-lg">
                            <img class="detail-passport-img rounded-xl items-center w-full h-full object-cover" alt="" />
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="address" class="text-sm font-medium text-blue-900 block mb-2 dark:text-gray-300">
                        Address In Indonesia
                    </label>
                    <p class="text-gray-600 font-semibold detail-address"></p>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex space-x-2 items-center p-6 bg-gray-50 border border-gray-100 rounded-b-2xl px-5 mt-5 rounded-b dark:border-gray-600">
                {{-- <button data-modal-toggle="user-detail-modal" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                    accept</button>
                <button data-modal-toggle="user-detail-modal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium text-sm px-5 py-2.5 hover:text-blue-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Decline</button> --}}
            </div>
        </div>
    </div>
</div>
