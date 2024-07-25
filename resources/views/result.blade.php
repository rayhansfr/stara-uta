<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Result') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-4 ">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden border-2 rounded-lg border-green-200 shadow-[0_0_2px_#fff,inset_0_0_0px_#fff,0_0_5px_#08f,0_0_15px_#08f,0_0_30px_#08f]">
                <div class=" p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Kandidat Terbaik Bulan Ini!") }}
                </div>

                @if (!empty($highestUtility))
                <div class="alert alert-info px-6 pb-6 text-gray-900 dark:text-gray-100">
                    <strong class="text-xl">{{ $highestUtility->nama }}</strong> dengan nilai utilitas sebesar <strong class="text-xl">{{ $highestUtility->nilai_utilitas }}</strong>
                </div>
                @endif
            </div>
        </div>

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
                        <li>C4: {{ session('intervalDiffs')['c5'] }}</li>
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
                        <li>C4: {{ session('maxScores')['c5'] }}</li>
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
                        <li>C4: {{ session('minScores')['c5'] }}</li>
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
                                <th scope="col" class="px-6 py-3">Rank</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">C1</th>
                                <th scope="col" class="px-6 py-3">C2</th>
                                <th scope="col" class="px-6 py-3">C3</th>
                                <th scope="col" class="px-6 py-3">C4</th>
                                <th scope="col" class="px-6 py-3">C5</th>
                                <th scope="col" class="px-6 py-3">Nilai Utilitas</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($results as $index => $result)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index+1 }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $result->nama }}
                                </th>
                                <td class="px-6 py-4">{{ $result->c1 }}</td>
                                <td class="px-6 py-4">{{ $result->c2 }}</td>
                                <td class="px-6 py-4">{{ $result->c3 }}</td>
                                <td class="px-6 py-4">{{ $result->c4 }}</td>
                                <td class="px-6 py-4">{{ $result->c5 }}</td>
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