<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 align-items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Kriteria Alternatif") }}
                    </div>
                </div>
                <div class="relative overflow-x-auto">
                    <div class="px-6 pb-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            <li>C1: Kerjasama Tim</li>
                            <li>C2: Kepedulian Terhadap Sesama</li>
                            <li>C3: Keingintahuan untuk Berkembang</li>
                            <li>C4: Partisipasi dalam Kegiatan</li>
                            <li>C4: Keaktifan dan Proaktif</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @include('alternatif.table')

    @if (session('intervalDiffs'))
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="font-semibold text-lg">{{ __('Interval Differences') }}</h3>
            <ul>
                <li>C1: {{ session('intervalDiffs')['c1'] }}</li>
                <li>C2: {{ session('intervalDiffs')['c2'] }}</li>
                <li>C3: {{ session('intervalDiffs')['c3'] }}</li>
                <li>C4: {{ session('intervalDiffs')['c4'] }}</li>
            </ul>
        </div>
    </div>
    @endif

</x-app-layout>