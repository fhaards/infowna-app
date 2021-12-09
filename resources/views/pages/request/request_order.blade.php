<form method="GET" action="{{ route('requests.index') }}" class="w-6/12 flex flex-nowrap justify-between gap-2 items-center">
    <div class="">
        <p class="uppercase tracking-widest text-gray-600 font-medium text-xs">Order</p>
    </div>
    <div class="flex flex-row gap-2">


        <div>
            <button type="submit"
                class="bg-blue-800 hover:bg-blue-900 inline-flex items-center justify-center text-xs p-2.5 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="21" x2="4" y2="14"></line>
                    <line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line>
                    <line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="1" y1="14" x2="7" y2="14"></line>
                    <line x1="9" y1="8" x2="15" y2="8"></line>
                    <line x1="17" y1="16" x2="23" y2="16"></line>
                </svg>
            </button>
        </div>
    </div>
</form>
