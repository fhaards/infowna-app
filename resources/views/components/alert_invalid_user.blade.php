<div class="flex bg-yellow-100 rounded-lg p-4 mb-4 dark:bg-yellow-200" role="alert">
    <svg class="w-5 h-5 text-yellow-700 flex-shrink-0 dark:text-yellow-800" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ml-3 text-sm font-medium text-yellow-700 dark:text-yellow-800">
        Please Complete youre presonal information
        <a href="{{ route('user.edit', Auth::user()->uuid) }}"
            class="font-semibold hover:text-yellow-800 underline dark:hover:text-yellow-900">
            here
        </a>
        . Requests must be validated account
    </div>
</div>
