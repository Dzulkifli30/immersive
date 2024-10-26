@extends('layouts.root')

@section('title')
Login - Masuk
@endsection

@section('content')
<div class="w-full min-h-screen h-full flex items-center justify-center bg-gray-500 bg-opacity-30">
    <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12 items-center">
        <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border text-black">
            <div class="p-6 mb-0 text-center border-b-0 rounded-t-2xl text-4xl font-semibold">
                <h5>Login</h5>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="flex-auto p-6">
                    <div class="mb-4">
                        <span class="font-bold">Masukkan Email</span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="text-base focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="email@gmail.com" />
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 relative">
                        <span class="font-bold">Masukkan Password</span>
                        <input type="password" id="password" name="password" value="{{ old('password') }}" required class="text-base focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password" />
                        <span class="absolute right-3 top-8 cursor-pointer" onclick="togglePasswordVisibility()">
                            <i id="eyeIcon" class="fa fa-eye-slash"></i>
                        </span>
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 text-center">
                        <button class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-t from-[#1410EB] to-[#1410EB] hover:border-slate-700 hover:bg-[#1410EB] hover:text-white">
                            Login
                        </button>
                    </div>
                    <div class="px-2 flex justify-between">
                        <span class="text-">Belum Punya Akun? <a href="{{ route('register') }}" class="text-[#1410EB] hover:text-blue-800 hover:underline">buat akun</a></span>
                        <span class="text-"><a href="{{ route('password.request') }}" class="text-[#1410EB] hover:text-blue-800 hover:underline">Lupa Password</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }
</script>
@endsection