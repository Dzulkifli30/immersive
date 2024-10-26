<nav class="navbar fixed-top">
    <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <a class="text-gray-800 font-semibold text-3xl leading-4 no-underline page-scroll" href="{{ route('landing.home') }}">Logo</a>

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
                    <a class="nav-link page-scroll  hover:text-[#F96D0E] {{ Request::routeIs('landing.home') ? 'text-[#F96D0E]' : 'text-gray-700' }}" href="{{ route('landing.home') }}">Home </a>
                </li>
                @if (Request::routeIs('landing.home'))
                <li>
                    <a class="nav-link page-scroll  hover:text-[#F96D0E] {{ Request::routeIs('landing.product') ? 'text-[#F96D0E]' : 'text-gray-700' }}" href="#pricing">Product</a>
                </li>
                @endif
                <li>
                    <a class="nav-link page-scroll  hover:text-[#F96D0E] {{ Request::routeIs('landing.gallery') ? 'text-[#F96D0E]' : 'text-gray-700' }}" href="{{ route('landing.gallery') }}">Gallery</a>
                </li>
                <li>
                    <a class="nav-link page-scroll  hover:text-[#F96D0E] {{ Request::routeIs('landing.news') ? 'text-[#F96D0E]' : 'text-gray-700' }}" href="{{ route('landing.news') }}">News</a>
                </li>
                <!-- <li>
                    <a class="nav-link page-scroll  hover:text-[#F96D0E] {{ Request::routeIs('landing.about') ? 'text-[#F96D0E]' : 'text-gray-700' }}" href="{{ route('landing.about') }}">About Us</a>
                </li> -->
                <li>
                    <a class="nav-link page-scroll  hover:text-[#F96D0E] {{ Request::routeIs('landing.faq') ? 'text-[#F96D0E]' : 'text-gray-700' }}" href="{{ route('landing.faq') }}">FAQ</a>
                </li>
            </ul>
            @if (Auth::user() == null)
            <span class="block lg:ml-3.5">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-white bg-[#1410EB] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-2.5 me-2" type="button">Login</button>
            </span>
            @endif
        </div> <!-- end of navbar-collapse -->
    </div> <!-- end of container -->
</nav>