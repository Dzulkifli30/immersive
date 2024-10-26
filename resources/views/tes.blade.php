@extends('layouts.root')

@section('title')
Tes - Account
@endsection

@section('content')
<div class="w-full min-h-screen h-full flex items-center justify-center bg-gray-500 bg-opacity-30">
    <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12 items-center">
        <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border text-black">
            <button onclick="confirmDelete()">Click Me</button>
            <div class="p-6 mb-0 text-center border-b-0 rounded-t-2xl text-2xl font-semibold">
                <h5>Silahkan isi biodata dahulu</h5>
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="flex-auto p-6">
                    <div class="mb-4">
                        <span class="font-bold">Masukkan Nama Usaha</span>
                        <input type="text" id="name" name="name" class="text-base focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="ayam geprek joder" />
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Masukkan Bidang Usaha</span>
                        <input type="text" id="name" name="name" class="text-base focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="pendidikan" />
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Masukkan alamat</span>
                        <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-base text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukan Alamat" require></textarea>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Masukkan Nomor Telpon</span>
                        <input type="number" id="nomor_telpon" name="nomor_telpon" class="text-base focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="081234567891" required />
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Masukkan Gambar (minimal 3)</span>
                        <input name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="gambar" type="file" multiple required />
                    </div>
                    <div class="text-center">
                        <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-t from-[#1410EB] to-[#1410EB] hover:border-slate-700 hover:bg-[#1410EB] hover:text-white">
                            Daftar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
@endsection