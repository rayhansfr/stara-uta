<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="grid grid-cols-2 align-items-center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Tabel Alternatif") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-self-end ">
                    <a href="{{ route('alternatif.create') }}" class="font-semibold bg-blue-600 p-2 text-gray-800 dark:text-gray-200 rounded-md hover:bg-blue-800 cursor-pointer">
                        Tambah Alternatif
                    </a>
                </div>
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">C1</th>
                            <th scope="col" class="px-6 py-3">C2</th>
                            <th scope="col" class="px-6 py-3">C3</th>
                            <th scope="col" class="px-6 py-3">C4</th>
                            <th scope="col" class="px-6 py-3">C5</th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatifs as $alternatif)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $alternatif->nama }}
                            </th>
                            <td class="px-6 py-4">{{ $alternatif->c1 }}</td>
                            <td class="px-6 py-4">{{ $alternatif->c2 }}</td>
                            <td class="px-6 py-4">{{ $alternatif->c3 }}</td>
                            <td class="px-6 py-4">{{ $alternatif->c4 }}</td>
                            <td class="px-6 py-4">{{ $alternatif->c5 }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                                <a href="{{ route('alternatif.delete', $alternatif->id) }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-6">
                <form action="{{ route('alternatif.calculate') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex justify-self-center items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
                        Hitung nilai Utilitas
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>