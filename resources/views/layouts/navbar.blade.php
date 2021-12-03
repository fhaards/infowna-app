<header class="shadow-sm fixed sm:relative z-10 w-full">
    <div class="p-4 mx-auto max-w-screen-xl">
        <div class="flex items-center justify-between space-x-4 lg:space-x-10">
            <div class="flex lg:w-0 lg:flex-1">
                <span class="px-10 py-2 bg-gray-200 rounded-lg items-center">
                    <a class="" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </span>
            </div>

            <div x-data="{ mobileMenu: true }">
                <div class="lg:hidden">
                    <button class="p-2 text-gray-600 bg-gray-100 rounded-lg" id="triggerMobile" type="button"
                        onclick="event.preventDefault(); document.getElementById('navbar').style.visibility = 'visible';"
                        @click="mobileMenu = !mobileMenu">
                        <span class="sr-only">Open menu</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" />
                        </svg>
                    </button>
                </div>
                <nav id="navbar"
                    class="mobile-menu shadow-lg w-full py-10 fixed left-0 mt-5 pl-5 bg-white text-sm font-medium text-xl flex-col
                            px-10 sm:px-0 sm:py-0 sm:shadow-none sm:text-sm sm:font-medium sm:mt-0 sm:pl-0 sm:space-x-8 sm:relative 
                            md:flex flex sm:flex-row "
                    x-show="mobileMenu" x-transition.opacity>

                    <a class="text-gray-500 p-2" href="">About</a>
                    <a class="text-gray-500 p-2" href="">Blog</a>
                    <a class="text-gray-500 p-2" href="">Projects</a>
                    <a class="text-gray-500 p-2" href="">Contact</a>

                    @guest
                        @if (Route::has('login'))
                            <a class="px-5 py-2 font-medium text-gray-500 bg-gray-100 rounded-lg sm:mb-0 mb-3"
                                href="{{ route('login') }}">
                                Log in
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a class="px-5 py-2 font-medium text-white bg-blue-600 rounded-lg"
                                href="{{ route('register') }}">
                                Sign up
                            </a>
                        @endif
                    @else
                        <div x-data="{ dropdownOpen: false }">
                            <button @click="dropdownOpen = !dropdownOpen"
                                class="relative font-medium p-2 text-gray-500 z-10 inline-flex gap-5 justify-content-center rounded-md bg-white focus:outline-none">
                                {{ Auth::user()->name }}
                                <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                class="fixed inset-0 h-full w-full z-10">
                            </div>
                            <div x-show="dropdownOpen" class="absolute mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-10">
                                <a href="#"
                                    class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                    your profile
                                </a>
                                <a class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </nav>
            </div>
        </div>
    </div>
</header>
