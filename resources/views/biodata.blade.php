@extends('layouts.root')

@section('title')
Biodata - Account
@endsection

@section('content')
<div class="w-full min-h-screen h-full flex items-center justify-center bg-gray-500 bg-opacity-30">
    <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12 items-center">
        <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border text-black">
            <div class="p-6 mb-0 text-center border-b-0 rounded-t-2xl text-2xl font-semibold">
                <h5>Silahkan isi biodata dahulu</h5>
            </div>
            <form action="{{ route('biodata.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex-auto p-6">
                    <div class="mb-4">
                        <span class="font-bold">Nama Usaha</span>
                        <input type="text" id="nama_usaha" name="nama_usaha" class="text-base focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="ayam geprek joder" />
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Bidang Usaha</span>
                        <select id="bidang_usaha_id" name="bidang_usaha_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Pilih Usaha</option>
                            @foreach($usaha as $data)
                            <option value="{{ $data->id }}">{{ $data->bidang_usaha }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Alamat</span>
                        <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-base text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukan Alamat" require></textarea>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Nomor Telpon</span>
                        <input type="number" id="nomor_telpon" name="nomor_telpon" class="text-base focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="081234567891" required />
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Foto Produk (minimal 3)</span>
                        <input name="gambar[]" id="" type="file" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" required />
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="text-center">
                        <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-t from-[#1410EB] to-[#1410EB] hover:border-slate-700 hover:bg-[#1410EB] hover:text-white">
                            Lanjut
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection