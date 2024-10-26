@php
if (auth()->user()->role == 1) {
$dashboardRoute = 'admin.dashboard';
} elseif (auth()->user()->role == 2) {
$dashboardRoute = 'super.dashboard';
} else {
$dashboardRoute = 'dashboard';
}
@endphp

<aside class="max-w-62.5 ease-nav-brand z-990 absolute inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-gray-100">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
            <img src="{{asset('images/logo_rill.png')}}" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-10" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand uppercase tracking-tighter">Interact Connect</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs($dashboardRoute) ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{ route($dashboardRoute) }}">
                    <div class="{{ Request::routeIs($dashboardRoute) ? 'bg-[#1410EB]' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Dashboard</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path
                                                class="{{ Request::routeIs($dashboardRoute) ? '' : 'fill-slate-800' }} opacity-60"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                            <path
                                                class="{{ Request::routeIs($dashboardRoute) ? '' : 'fill-slate-800' }}"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                </a>
            </li>

            @if (Auth::user()->role == 2)
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('users.index') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{route('users.index')}}">
                    <div class="{{ Request::routeIs('users.index') ? 'bg-[#1410EB]' : 'bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg  bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Table User</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(153.000000, 2.000000)">
                                            <path class="{{ Request::routeIs('users.index') ? '' : 'fill-slate-800' }}  opacity-60" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                                            <path class="{{ Request::routeIs('users.index') ? '' : 'fill-slate-800' }}" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Table User</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->role == 2 || Auth::user()->role == 1)
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('admin.pesanan') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{route('admin.pesanan')}}">
                    <div class="{{ Request::routeIs('admin.pesanan') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Client Order</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->role == 0)
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('pemesanan.index') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{route('pemesanan.index')}}">
                    <div class="{{ Request::routeIs('pemesanan.index') ? 'bg-[#1410EB] text-white' : 'bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-table" aria-hidden="true"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">pesananmu</span>
                </a>
            </li>
            @endif

            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account pages</h6>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::segment(2) == Auth::user()->biodata->id ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{route('biodata.edit', Auth::user()->biodata->id)}}">
                    <div class="{{ Request::segment(2) == Auth::user()->biodata->id ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>customer-support</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(1.000000, 0.000000)">
                                            <path class="{{Request::segment(2) == Auth::user()->biodata->id ? 'fill-white' : 'fill-slate-800'}}  opacity-60" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                                            <path class="{{Request::segment(2) == Auth::user()->biodata->id ? 'fill-white' : 'fill-slate-800'}}" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                                            <path class="{{Request::segment(2) == Auth::user()->biodata->id ? 'fill-white' : 'fill-slate-800'}}" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Profile</span>
                </a>
            </li>

            @if (Auth::user()->role == 2 || Auth::user()->role == 1)
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Web Profile</h6>
            </li>
            <li class="my-1 w-10/12 bg-white rounded-lg mx-auto">
                <button onclick="toggleFaq('landing')" class="py-2.5 text-normal ease-nav-brand my-0 flex items-center justify-between whitespace-nowrap w-full px-4 transition-colors {{ Request::routeIs('header.index') || Request::routeIs('features.index') || Request::routeIs('testimoni.index') || Request::routeIs('price.index') ? 'bg-[#1410EB]' : 'bg-gray-600' }} text-white rounded-lg">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Landing Page</span>
                    <div class="mr-2 flex h-7 w-7 items-center justify-center rounded-lg text-white bg-center text-center xl:p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </button>
                <div id="landing" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <ul>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('header.index') ? 'shadow-soft-xl rounded-lg bg-gray-50 font-semibold text-slate-700' : '' }}" href="{{route('header.index')}}">
                                <div class="{{ Request::routeIs('header.index') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="fa fa-header" aria-hidden="true"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Header</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('features.index') ? 'shadow-soft-xl rounded-lg bg-gray-50 font-semibold text-slate-700' : '' }}" href="{{route('features.index')}}">
                                <div class="{{ Request::routeIs('features.index') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Features</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('testimoni.index') ? 'shadow-soft-xl rounded-lg bg-gray-50 font-semibold text-slate-700' : '' }}" href="{{route('testimoni.index')}}">
                                <div class="{{ Request::routeIs('testimoni.index') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Testimoni</span>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('price.index') ? 'shadow-soft-xl rounded-lg bg-gray-50 font-semibold text-slate-700' : '' }}" href="{{route('price.index')}}">
                                <div class="{{ Request::routeIs('price.index') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Price List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('berita.index') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{route('berita.index')}}">
                    <div class="{{ Request::routeIs('berita.index') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Berita</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('faqs.index') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{route('faqs.index')}}">
                    <div class="{{ Request::routeIs('faqs.index') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg  bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-question" aria-hidden="true"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">FAQ</span>
                </a>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Data Master</h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('usaha.index') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{route('usaha.index')}}">
                    <div class="{{ Request::routeIs('usaha.index') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Bidang Usaha</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::routeIs('usaha.index') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}" href="{{route('usaha.index')}}">
                    <div class="{{ Request::routeIs('usaha.index') ? 'bg-[#1410EB] text-white' : 'text-slate-800 bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kategori Berita</span>
                </a>
            </li>
            @endif

        </ul>
    </div>
</aside>