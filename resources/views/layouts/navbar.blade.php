<nav  class="@guest hidden @else shadow-lg sm:shadow-lg md:shadow-sm bg-white border-t-2 border-yellow-300 @endguest sm:relative fixed w-full z-40 border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-800">
    <div class="container mx-auto flex flex-wrap items-center justify-between px-4 sm:py-2 py-0 mx-auto max-w-screen-xl sm:max-w-4xl">
        <a class=" bg-none" href="{{ url('/') }}">
            <div class="flex flex-row justify-center items-center">
                <svg version="1.1" id="logo" class="h-10 w-32" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" height="100%">
                    <image href="{{ asset('img/baseapp/logo-sws-b.svg') }}" height="100%" />
                </svg>
            </div>
        </a>

        <div class="flex items-center md:order-2">
            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="md:hidden ml-1 text-gray-600 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 rounded-lg text-sm p-2 inline-flex items-center dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </button>
        </div>

        <div class="hidden md:flex justify-between items-center w-full md:w-auto md:order-2" id="mobile-menu-2">
            <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a class="px-5 py-2 font-medium text-blue-800 hover:text-blue-500 mt-5 sm:mt-0 sm:mb-0 mb-3"
                                href="{{ route('login') }}">
                                Log in
                            </a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a class="px-5 py-2 font-medium text-blue-800 hover:text-blue-500"
                                href="{{ route('register') }}">
                                Sign up
                            </a>
                        <li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('home') }}"
                            class="{{$curUrl == 'home' ? 'text-yellow-300' : 'text-blue-900'}} font-medium hover:text-yellow-300 border-t border-gray-100 md:hover:text-yellow-300 md:border-0 block pl-3 pr-4 py-2 md:hover:text-yellow-300 md:p-2 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:text-yellow-300 dark:border-gray-700"
                            aria-current="page">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('requests.index') }}"
                            class="{{$curUrl == 'requests' ? 'text-yellow-300' : 'text-blue-900'}} font-medium hover:text-yellow-300 border-t border-gray-100 md:hover:text-yellow-300 md:border-0 block pl-3 pr-4 py-2 md:hover:text-yellow-300 md:p-2 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:text-yellow-300 dark:border-gray-700">
                            Request
                        </a>
                    </li>
                    @if (Auth::user()->user_group == 'admin')
                        <li>
                            <a href="{{ route('user.index') }}"
                                class="{{$curUrl == 'user' ? 'text-yellow-300' : 'text-blue-900'}} font-medium hover:text-yellow-300 border-t border-gray-100 md:hover:text-yellow-300 md:border-0 block pl-3 pr-4 py-2 md:hover:text-yellow-300 md:p-2 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:text-yellow-300 dark:border-gray-700">
                                User List
                            </a>
                        </li>
                    @endif
                    <li>
                        <button id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown"
                            class="inline-flex gap-3 items-center justify-between w-full font-medium text-blue-900 hover:text-yellow-300 border-t border-gray-100 md:hover:text-yellow-300 md:border-0 block pl-3 pr-4 py-2 md:hover:text-yellow-300 md:p-2 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:text-yellow-300 dark:border-gray-700">
                            {{ Auth::user()->name }}
                            <svg class="h-4 w-4 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="hidden  z-40 sm:max-w-48 sm:w-auto w-full bg-white text-base list-none divide-y divide-gray-100 rounded shadow my-4 dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown">
                            <div class="sm:px-4 px-8 py-3">
                                <span class="text-gray-900 block text-sm dark:text-white">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-blue-9000 block text-xs font-medium truncate dark:text-gray-400">
                                    {{ Auth::user()->email }}
                                </span>
                            </div>
                            <ul class="py-1 sm:px-0 px-4" aria-labelledby="dropdown">
                                @if (Auth::user()->user_group == 'user')
                                    <li>
                                        <a href="{{ route('user.index') }}"
                                            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            Profile
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('user.edit', Auth::user()->uuid) }}"
                                        class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>
