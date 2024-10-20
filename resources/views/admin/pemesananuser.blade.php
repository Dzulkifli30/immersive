@extends('layouts.root')

@section('title')
Booking Booth - Costumer
@endsection

@section('content')
@include('components.aside')

<main class="ease-soft-in-out xl:ml-68.5 h-full max-h-screen rounded-xl transition-all duration-200">
  <!-- Navbar -->
  <nav class="flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main>
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
          <li class="text-sm leading-normal">
            <a class="opacity-50 text-slate-700" href="javascript:;">Admin</a>
          </li>
          <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Pesanan</li>
        </ol>
        <h6 class="mb-0 font-bold capitalize">List Pesanan Client</h6>
      </nav>

      <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
        <div class="flex items-center md:ml-auto md:pr-4">
          <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
            <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
            </span>
            <input type="text" class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
          </div>
        </div>
        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
          <!-- online builder btn  -->
          <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
          <li class="flex items-center">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-0 py-2 text-sm font-bold transition-all ease-nav-brand text-gray-600 hover:text-black">
              <i class="fa fa-log-out sm:mr-1"></i>
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

  <!-- cards -->
  <div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between">
            <h6>Tabel Pesanan Client</h6>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2 items-center">
            <div class="p-0 overflow-x-auto">
              <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                  <tr>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Client</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Event</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Booking</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Paket</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Info</th>
                    <!-- <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  @foreach($pemesanan as $data)
                  <tr class="">
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="px-4 text-ellipsis overflow-hidden max-w-xs">
                        <h6 class="mb-0 text-base leading-normal">{{$data->user->name}}</h6>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="px-4 text-ellipsis overflow-hidden max-w-xs">
                        <h6 class="mb-0 text-base leading-normal">{{$data->nama_event}}</h6>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="max-w-sm">
                        <h6 class="mb-0 text-sm leading-normal break-words line-clamp-3">{{$data->jadwal_mulai}} s/d {{$data->jadwal_berakhir}}</h6>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="px-4">
                        <h6 class="mb-0 text-sm leading-normal">{{ $data->paket->jenis}}</h6>
                      </div>
                    </td>
                    <!-- status -->
                    @if ($data->status == 0)
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="px-4">
                        <h6 class="mb-0 text-sm leading-normal font-bold text-yellow-300">Pending</h6>
                      </div>
                    </td>
                    @elseif ($data->status == 1)
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="px-4">
                        <h6 class="mb-0 text-sm leading-normal font-bold text-green-500">Confirmed</h6>
                      </div>
                    </td>
                    @else
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="px-4">
                        <h6 class="mb-0 text-sm leading-normal font-bold text-blue-600">Done</h6>
                      </div>
                    </td>
                    @endif
                    <!-- end status -->
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="px-4">
                        <h6 class="mb-0 text-sm leading-normal">{{ $data->total_harga}}.000</h6>
                      </div>
                    </td>
                    @if ($data->status == 0)
                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="flex justify-center">
                        <a href="#" class="cursor-pointer flex p-2 m-1 rounded-md items-center bg-[#F96D0E] hover:bg-orange-600 text-white font-medium ">
                          <i class="fa fa-pencil pr-1" aria-hidden="true"></i> Edit
                        </a>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="#" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class=" flex p-2 m-1 rounded-md items-center bg-gray-600 hover:bg-gray-700 text-white font-medium">
                            <i class="fa fa-trash-o pr-1" aria-hidden="true"></i> Hapus
                          </button>
                        </form>
                      </div>
                    </td>
                    @else
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="px-4">
                        <h6 class="mb-0 text-sm leading-normal font-bold text-yellow-300">tidak dapat mengubah pesanan</h6>
                      </div>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="flex justify-center mt-5">
                {{ $pemesanan->links('pagination.custom') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end cards -->
</main>

@endsection