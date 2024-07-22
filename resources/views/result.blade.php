<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
        <<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 max-w-7xl mx-auto sm:px-6 lg:px-8 my-2 py-4 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                    <p class="font-bold">Sukses</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
    </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Tabel Hasil Perhitungan!") }}
            </div>
            <!-- @if (session('intervalDiffs'))
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">{{ __('Perbedaan Interval') }}</h3>
                    <ul>
                        <li>C1: {{ session('intervalDiffs')['c1'] }}</li>
                        <li>C2: {{ session('intervalDiffs')['c2'] }}</li>
                        <li>C3: {{ session('intervalDiffs')['c3'] }}</li>
                        <li>C4: {{ session('intervalDiffs')['c4'] }}</li>
                    </ul>
                </div>
            </div>
            @endif
            @if (session('maxScores'))
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">{{ __('Max') }}</h3>
                    <ul>
                        <li>C1: {{ session('maxScores')['c1'] }}</li>
                        <li>C2: {{ session('maxScores')['c2'] }}</li>
                        <li>C3: {{ session('maxScores')['c3'] }}</li>
                        <li>C4: {{ session('maxScores')['c4'] }}</li>
                    </ul>
                </div>
            </div>
            @endif
            @if (session('minScores'))
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">{{ __('Min') }}</h3>
                    <ul>
                        <li>C1: {{ session('minScores')['c1'] }}</li>
                        <li>C2: {{ session('minScores')['c2'] }}</li>
                        <li>C3: {{ session('minScores')['c3'] }}</li>
                        <li>C4: {{ session('minScores')['c4'] }}</li>
                    </ul>
                </div>
            </div>
            @endif
            @if (session('intervalDiffs'))
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">{{ __('Bobot') }}</h3>
                    <ul>
                        <li>C1: {{ session('criteriaWeights')['c1'] }}</li>
                        <li>C2: {{ session('criteriaWeights')['c2'] }}</li>
                        <li>C3: {{ session('criteriaWeights')['c3'] }}</li>
                        <li>C4: {{ session('criteriaWeights')['c4'] }}</li>
                    </ul>
                </div>
            </div>
            @endif -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">id</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Personalitas</th>
                            <th scope="col" class="px-6 py-3">Ketepatan Jawaban</th>
                            <th scope="col" class="px-6 py-3">Kelancaran Jawaban</th>
                            <th scope="col" class="px-6 py-3">Pengetahuan</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Nilai Utilitas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($results as $result)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $result->id }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $result->nama }}
                            </th>
                            <td class="px-6 py-4">{{ $result->c1 }}</td>
                            <td class="px-6 py-4">{{ $result->c2 }}</td>
                            <td class="px-6 py-4">{{ $result->c3 }}</td>
                            <td class="px-6 py-4">{{ $result->c4 }}</td>
                            <td class="px-6 py-4">{{ $result->status ? 'True' : 'False' }}</td>
                            <td class="px-6 py-4">{{ $result->nilai_utilitas }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
