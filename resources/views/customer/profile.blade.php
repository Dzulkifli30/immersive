@extends('layouts.root')

@section('title')
Profile - {{Auth::user()->name}}
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
            <a class="opacity-50 text-slate-700" href="javascript:;">
              @if (Auth::user()->role == 0)
              Customer
              @else
              Admin
              @endif
            </a>
          </li>
          <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Biodata profile</li>
        </ol>
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

  <!-- cards -->
  <div class="w-full px-6 py-6 mx-auto">

    <!-- cards row 1 -->
    <div class="items-start p-8 space-y-4">
      <div class="flex justify-center">
        <h2 class="text-4xl uppercase font-semibold text-gray-900 mb-4 text-center">Profile User</h2>
      </div>

      <div class="max-w-lg lg:max-w-screen-lg w-full bg-white border border-gray-200 rounded-lg shadow mx-auto">
        <!-- Trigger Div -->
        <button onclick="toggleFaq('biodata')" class="w-full">
          <div class="p-5 border border-gray-200 shadow rounded-lg flex lg:px-14 cursor-pointer justify-between">
            <p class="text-lg font-bold tracking-tight text-gray-900">Biodata User</p>
            <div class="pt-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </div>
          </div>
        </button>

        <!-- Content Div -->
        <div id="biodata" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
          <div class="p-5 lg:px-8">
            <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <hr>
              <div class="p-6 grid grid-cols-2 lg:gap-x-8 gap-2">
                <div class="mb-5">
                  <label for="name" class="block mb-2 text-base font-medium text-gray-900 ">Nama:</label>
                  <input type="text" id="name" name="name" value="{{$biodata->user->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
                <div class="mb-5">
                  <label for="email" class="block mb-2 text-base font-medium text-gray-900 ">Email:</label>
                  <input type="email" id="email" name="email" value="{{$biodata->user->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
                <div class="mb-5">
                  <label for="nama_usaha" class="block mb-2 text-base font-medium text-gray-900 ">Nama Usaha:</label>
                  <input type="text" id="nama_usaha" name="nama_usaha" value="{{$biodata->nama_usaha}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
                <div class="mb-5">
                  <label for="name" class="block mb-2 text-base font-medium text-gray-900 ">Bidang Usaha:</label>
                  <select id="bidang_usaha_id" name="bidang_usaha_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($usaha as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $biodata->bidang_usaha_id ? 'selected' : '' }}>{{ $data->bidang_usaha }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-5">
                  <label for="nomor_telpon" class="block mb-2 text-base font-medium text-gray-900 ">Nomor Telepon:</label>
                  <input type="number" id="nomor_telpon" name="nomor_telpon" value="{{$biodata->nomor_telpon}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
                <div class="mb-5">
                  <label for="alamat" class="block mb-2 text-base font-medium text-gray-900 ">Alamat:</label>
                  <textarea id="alamat" name="alamat" rows="3" class="block p-2.5 w-full text-sm text-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukan Isi" require>{{$biodata->alamat}}</textarea>
                </div>
              </div>
              <div class="w-full flex justify-center">
                <button type="submit" class="text-white bg-[#1410EB] hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full max-w-xs px-5 py-2.5 text-center">Edit Profile</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="max-w-lg lg:max-w-screen-lg w-full bg-white border border-gray-200 rounded-lg shadow mx-auto">
        <!-- Trigger Div -->
        <button onclick="toggleFaq('change-password')" class="w-full">
          <div class="p-5 border border-gray-200 shadow rounded-lg flex lg:px-14 cursor-pointer justify-between">
            <p class="text-lg font-bold tracking-tight text-gray-900">Ganti Password</p>
            <div class="pt-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </div>
          </div>
        </button>

        <!-- Content Div -->
        <div id="change-password" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
          <div class="p-5 lg:px-8">
            <form action="{{ route('biodata.changepassword') }}" method="POST">
              @csrf
              <hr>
              <div class="p-6 w-1/2">
                <div class="mb-5">
                  <label for="old_password" class="block mb-2 text-base font-medium text-gray-900 ">Enter Old Password:</label>
                  <input type="password" id="old_password" name="old_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                  @error('current_password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="p-6 grid grid-cols-2 lg:gap-x-8 gap-2">
                <div class="mb-5">
                  <label for="new_password" class="block mb-2 text-base font-medium text-gray-900 ">Enter New Password:</label>
                  <input type="password" id="new_password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                  @error('new_password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-5">
                  <label for="new_password_confirmation" class="block mb-2 text-base font-medium text-gray-900 ">Confirmation Password:</label>
                  <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
              </div>
              <div class="w-full flex justify-center">
                <button type="submit" class="text-white bg-[#1410EB] hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full max-w-xs px-5 py-2.5 text-center">Ganti Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @if ($biodata->user->role == 0)
      <div class="max-w-lg lg:max-w-screen-lg w-full bg-white border border-gray-200 rounded-lg shadow mx-auto">
        <!-- Trigger Div -->
        <button onclick="toggleFaq('produk')" class="w-full">
          <div class="p-5 border border-gray-200 shadow rounded-lg flex lg:px-14 cursor-pointer justify-between">
            <p class="text-lg font-bold tracking-tight text-gray-900">Produk</p>
            <div class="pt-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </div>
          </div>
        </button>

        <!-- Content Div -->
        <div id="produk" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
          <div class="p-5 lg:px-8">
            <div class="flex-auto px-0 pt-0 pb-2 items-center">
              <form action="{{ route('biodata.updategambar', $biodata->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                  <label for="gambar" class="block text-gray-700 text-lg font-bold mb-2">Tambah Gambar Produk:</label>
                  <div class="flex gap-4">
                    <input name="gambar[]" id="gambar" type="file" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" />
                    <button type="submit"
                      class="w-1/6 bg-[#1410EB] text-sm hover:bg-blue-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline">
                      Tambah Gambar
                    </button>
                  </div>
                </div>
              </form>
              <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                  <thead class="align-bottom">
                    <tr>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Gambar Produk</th>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $images = json_decode($biodata->gambar, true);
                    @endphp
                    @foreach($images as $index => $data)
                    <tr>
                      <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <div class="px-4 flex justify-center">
                          <img src="{{ asset('/storage/uploads/'.$data)}}" class="w-full max-w-lg" alt="">
                        </div>
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <div class="flex justify-center">
                          <form id="deleteForm{{ $index }}" action="{{ route('biodata.hapusgambar', $biodata->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="gambar" value="{{ $data }}">
                            <button type="button" onclick="confirmDelete('{{ $index }}')" class=" flex p-2 m-1 rounded-md items-center bg-gray-600 hover:bg-gray-700 text-white font-medium">
                              <i class="fa fa-trash-o pr-1" aria-hidden="true"></i> Hapus
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

    </div>
    <!-- end cards -->
  </div>
</main>
<script>

</script>
@endsection