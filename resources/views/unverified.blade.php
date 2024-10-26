@extends('layouts.root')

@section('title')
unverified - Account
@endsection

@section('content')
<div class="w-full min-h-screen h-full flex items-center justify-center bg-gray-500 bg-opacity-30">
    <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12 items-center">
        <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                <h5>Akun Belum terverifikasi</h5>
            </div>
            <div class="flex-auto p-6">
                <div class="mb-4 text-center">
                    <p class="text-lg focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                        Silahkan Hubungi Admin untuk verifikasi akun lebih lanjut
                    </p>
                </div>
                <div class="text-center">
                    <a href="https://wa.me/6285886587944" target="_blank" rel="noopener noreferrer" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                        Chat Admin
                    </a>
                </div>
                <div class="text-center">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-r from-red-600 to-rose-400 hover:border-red-600 hover:bg-redborder-red-600 hover:text-white">
                        Kembali
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection