@extends('layouts.landing')

@section('title')
    Tentang - Immersive
@endsection

@section('content')
    @include('components.nav')

    <!-- Header -->
    <header id="header" class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
            <p class="text-6xl">INI ABOUT PAGE</p>
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->
@endsection