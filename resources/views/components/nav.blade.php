<nav class="navbar fixed-top">
    <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <a class="text-gray-800 font-semibold text-3xl leading-4 no-underline page-scroll" href="{{ route('landing.home') }}">Immersive</a>

        <!-- Image Logo -->
        <!-- <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline"
            href="index.html">
            <img src="{{ asset('images/logo.svg') }}" alt="alternative" class="h-8" />
        </a> -->

        <button
            class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400"
            type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center"
            id="navbarsExampleDefault">
            <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                <li>
                    <a class="nav-link page-scroll {{ Request::routeIs('landing.home') ? 'active' : '' }}" href="{{ route('landing.home') }}">Home </a>
                </li>
                <li>
                    <a class="nav-link page-scroll {{ Request::routeIs('landing.product') ? 'active' : '' }}" href="{{ route('landing.product') }}">Product</a>
                </li>
                <li>
                    <a class="nav-link page-scroll {{ Request::routeIs('landing.news') ? 'active' : '' }}" href="{{ route('landing.news') }}">News</a>
                </li>
                <li>
                    <a class="nav-link page-scroll {{ Request::routeIs('landing.about') ? 'active' : '' }}" href="{{ route('landing.about') }}">About Us</a>
                </li>
                <li>
                    <a class="nav-link page-scroll {{ Request::routeIs('landing.faq') ? 'active' : '' }}" href="{{ route('landing.faq') }}">FAQ</a>
                </li>
            </ul>
            @if (Auth::user() == null)
            <span class="block lg:ml-3.5">
                <button onclick="showPopup('popup-login')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</button>
            </span>
            @endif
        </div> <!-- end of navbar-collapse -->
    </div> <!-- end of container -->
</nav>