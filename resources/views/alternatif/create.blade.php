<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Tambah Data Alternatif") }}
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('alternatif.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('nama')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="c1">Kerjasama Tim</label>
                                    <input type="number" name="c1" id="c1" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="1-10">
                                    @error('c1')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="c2">Kepedulian Terhadap Sesama</label>
                                    <input type="number" name="c2" id="c2" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="1-10">
                                    @error('c2')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="c3">Keingintahuan untuk berkembang</label>
                                    <input type="number" name="c3" id="c3" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="1-10">
                                    @error('c3')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="c4">Partisipasi dalam Kegiatan</label>
                                    <input type="number" name="c4" id="c4" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="1-10">
                                    @error('c4')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="c3">Keaktifan dan Proaktif</label>
                                    <input type="number" name="c5" id="c5" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="1-10">
                                    @error('c5')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div class=" text-red-300 mb-6">
                                    Masukkan Nilai dengan skala 1-10
                                </div>
                            </div>
                            <div class="justify-content-end mb-4">
                                <button type="submit" class="p-2 bg-blue-600 text-gray-800 dark:text-gray-200 rounded-md hover:bg-blue-800 cursor-pointer">Simpan</button>
                                <a href="{{ route('dashboard') }}" class="bg-transparent border-2 p-2 h-6 text-gray-800 dark:text-gray-200 rounded-md cursor-pointer border-gray-300 dark:border-gray-600">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>