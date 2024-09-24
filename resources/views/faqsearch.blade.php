@extends('layouts.landing')

@section('title')
FAQ - Immersive
@endsection

@section('content')
@include('components.nav')

<!-- Header -->
<header id="header" class="header py-28 text-center md:pt-4 xl:pt-10 xl:pb-4">
    <div class="container px-4 sm:px-8">
        <div class="mb-16 lg:mt-32 xl:mt-40 xl:mr-12">
            <h1 class="h1-large mb-5">FAQ</h1>
        </div>
    </div> <!-- end of container -->
</header> <!-- end of header -->
<!-- end of header -->
<div class="w-full pb-6 lg:pb-20 flex flex-col items-center">
    <form class="max-w-sm lg:max-w-screen-lg w-full" method="GET" action="{{ route('search.faq') }}">
        <div class="relative">
            <input type="search" name="query" id="default-search"
                class="block w-full p-4 ps-10 text-md text-black border border-black rounded-lg"
                placeholder="Cari pertanyaan" required />
            <button type="submit"
                class="text-black absolute end-2.5 bottom-2.5 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-lg py-1 pr-4 ">
                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M16.65 16.65A7.45 7.45 0 1110.2 3.8a7.45 7.45 0 016.45 12.85z" />
                </svg>
            </button>
        </div>
    </form>
</div>
<!-- Features -->
<div id="faq" class="">
    <div class="container px-8 xl:px-4 flex flex-col items-center gap-6">

        @foreach($posts as $data)
        <div class="max-w-sm lg:max-w-screen-lg w-full bg-white border border-gray-200 rounded-lg shadow">
            <!-- Trigger Div -->
            <button onclick="toggleFaq('content{{ $data->id }}')" class="w-full">
                <div class="p-5 border border-gray-200 shadow rounded-lg flex lg:px-14 cursor-pointer justify-between">
                    <p class="text-lg font-bold tracking-tight text-gray-900">{{$data->pertanyaan}}</p>
                    <div class="pt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
            </button>

            <!-- Content Div -->
            <div id="content{{ $data->id }}" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                <div class="p-5 lg:px-14">
                    <p id="" class="mb-3 font-normal text-gray-700">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat a minus vero? Nemo deserunt laboriosam cum itaque possimus aliquam, ipsam enim iste quidem corporis modi ipsa non sequi dignissimos in.</p>
                </div>
            </div>
        </div>
        @endforeach

    </div> <!-- end of container -->
</div> <!-- end of cards-1 -->


<!-- end of features -->

<div class=""></div>
<script>
    function toggleFaq(popupId) {
        var contentDiv = document.getElementById(popupId);
        // var textElement = document.getElementById('text' + popupId.replace('content', ''));

        // Toggle maxHeight for the accordion effect
        if (contentDiv.style.maxHeight) {
            contentDiv.style.maxHeight = null;
        } else {
            contentDiv.style.maxHeight = contentDiv.scrollHeight + "px";
        }

    }
</script>
@endsection