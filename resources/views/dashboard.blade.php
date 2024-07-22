<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
