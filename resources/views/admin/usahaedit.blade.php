@extends('layouts.root')

@section('title')
Edit Bidang usaha - Admin
@endsection

@section('content')
@include('components.aside')

<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
  <!-- Navbar -->
  <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
          <li class="text-sm leading-normal">
            <a class="opacity-50 text-slate-700" href="javascript:;">Admin</a>
          </li>
          <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Bidang Usaha</li>
        </ol>
        <h6 class="mb-0 font-bold capitalize">Edit Usaha</h6>
      </nav>

      <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
        <div class="flex items-center md:ml-auto md:pr-4">
          <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
            <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
              <!-- <i class="fas fa-search"></i> -->
            </span>
            <!-- <input type="text" class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Type here..." /> -->
          </div>
        </div>
        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
          <!-- online builder btn  -->
          <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
          <li class="flex items-center">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-0 py-2 text-sm font-bold transition-all ease-nav-brand text-gray-600 hover:text-black">
              <i class="fa fa-user sm:mr-1"></i>
              <span class="hidden sm:inline">Log Out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end Navbar -->

  <div class="px-10">
    <a href="{{route('usaha.index')}}">
      <p class="font-bold text-lg underline text-gray-700 hover:text-black">
        < Kembali</p>
    </a>
  </div>
  <div class="w-full px-6 py-6 mx-auto">

    <!-- cards row 1 -->
    <div class="items-start p-8 space-y-4">
      <div class="flex justify-center">
        <h2 class="text-4xl uppercase font-semibold text-gray-900 mb-4 text-center">Edit usaha</h2>
      </div>
      <div id="form" class="lg:w-2/3 mx-auto block">
        <div class="bg-white shadow border rounded-lg p-4">
          <form action="{{ route('usaha.update', $usaha->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @METHOD('PUT')
            <div class="w-full">
              <div class="mb-4">
                <label for="bidang_usaha" class="block text-gray-700 text-lg font-bold mb-2">Bidang Usaha:</label>
                <input type="text" id="bidang_usaha" name="bidang_usaha" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="Masukkan bidang Usaha" require value="{{$usaha->bidang_usaha}}">
              </div>
              <div class="mb-4 w-full flex justify-center">
                <button type="submit"
                  class="bg-[#1410EB] hover:bg-blue-700 text-white font-bold py-2 px-16 rounded focus:outline-none focus:shadow-outline">
                  Edit Bidang Usaha
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end cards -->
  </div>
</main>
@endsection