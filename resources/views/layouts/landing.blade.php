<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Pavo is a mobile app Tailwind CSS HTML template created to help you present benefits, features and information about mobile apps in order to convince visitors to download them" />
    <meta name="author" content="Your name" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image" /> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>@yield('title')</title>

    <!-- Styles -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
    @stack('styles')
    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body data-spy="scroll" data-target=".fixed-top">
    @yield('content')

    @include('components.footer')
    <!-- popup login -->
    <div id="popup-login" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50">
        <div
            class="max-h-[calc(100vh-5em)] h-fit w-1/2 max-w-md scale-90 overflow-y-auto overscroll-contain rounded-2xl bg-white  text-black shadow-2xl transition absolute"
            for="">
            <div class="flex items-center justify-between p-3">
                <h3 class="text-lg font-light">Login</h3>
                <button onclick="hidePopup('popup-login')" class="text-black font-bold px-2 py-1 rounded bg-primary-red">X</button>
            </div>
            <form action="{{ route('login') }}" method="POST" multipart>
                <hr>
                @csrf
                <div class="p-6">
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-base font-medium text-gray-900 ">Your email</label>
                        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="cihuy@gmail.com" required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-base font-medium text-gray-900 ">Your password</label>
                        <input type="password" id="password" name="password" autocomplete="current-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    </div>
                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                            <label for="remember" class="ms-2 text-base font-medium text-gray-900">Remember me</label>
                        </div>
                    </div>
                    <div class="flex mb-5">
                        <p class="text-sm text-gray-900">don't have account? <a href="{{ route('register') }}" class="text-blue-500 hover:text-gray-400">Register here</a></p>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-5 py-2.5 text-center">Login</button>
                </div>
            </form>
        </div>
    </div>
    <a href="https://wa.me/6285886587944" target="_blank" rel="noopener noreferrer" class="fixed bottom-8 right-4 bg-green-500 hover:bg-green-600 text-white h-14 w-14 rounded-full shadow-lg flex items-center justify-center transition duration-300 ease-in-out text-4xl">
        <!-- WhatsApp SVG Icon -->
        <i class="fa fa-whatsapp" aria-hidden="true"></i>
    </a>
    <script src="{{ asset('js/jquery.min.js') }}"></script> <!-- jQuery for JavaScript plugins -->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ asset('js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ asset('js/scripts.js') }}"></script> <!-- Custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        // Function to show popup
        function showPopup(popupId) {
            document.getElementById(popupId).classList.remove('hidden');
            document.getElementById(popupId).classList.add('flex');
        }

        // Function to hide popup
        function hidePopup(popupId) {
            document.getElementById(popupId).classList.remove('flex');
            document.getElementById(popupId).classList.add('hidden');
        }

        // Event listeners for buttons
        document.getElementById('profileButton').addEventListener('click', function() {
            var profileMenu = document.getElementById('profileMenu');
            profileMenu.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>

</html>