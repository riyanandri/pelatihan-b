<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fitur Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('post.tambah') }}">
                <button
                    class="mb-3 text-white text-center font-medium bg-blue-700 hover:bg-blue-500 focus:ring-blue-300 rounded-lg sm:w-auto px-5 py-2.5">
                    Tambah data
                </button>
            </a>

            @if (session('success'))
                <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Sukses!</span> {{ session('success') }}
                    </div>
                </div>
            @endif


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-3 px-6 text-center">No</th>
                            <th class="py-3 px-6 text-center">Judul</th>
                            <th class="py-3 px-6 text-center">Deskripsi</th>
                            <th class="py-3 px-6 text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                            <?php $no = 1; ?>
                            @foreach ($data as $item)
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 px-6 text-center">{{ $no++ }}</td>
                                    <td class="py-3 px-6 text-center">{{ $item->judul }}</td>
                                    <td class="py-3 px-6 text-center">{{ $item->deskripsi }}</td>
                                    <td class="py-3 px-6 text-center">
                                        <form onsubmit="return confirm('Yakin ingin menghapus?');"
                                            action="{{ route('post.hapus', $item->id) }}" method="post">

                                            <div class="flex flex-row">
                                                <!-- tombol edit -->
                                                <div
                                                    class="group relative h-6 w-14 overflow-hidden rounded-lg bg-white text-lg shadow mr-2">
                                                    <a href="{{ route('post.edit', $item->id) }}"
                                                        id="{{ $item->id }}-edit-btn">
                                                        <div
                                                            class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                                                        </div>
                                                        <span
                                                            class="relative text-base group-hover:text-white">Edit</span>
                                                    </a>
                                                </div>


                                                <!-- tombol hapus -->
                                                @csrf
                                                @method('DELETE')
                                                <div
                                                    class="group relative h-6 w-14 overflow-hidden rounded-lg bg-white text-lg shadow">
                                                    <button type="submit" id="{{ $item->id }}-delete-btn">
                                                        <div
                                                            class="absolute inset-0 w-3 bg-red-500 transition-all duration-[250ms] ease-out group-hover:w-full">
                                                        </div>
                                                        <span
                                                            class="relative text-base group-hover:text-white">Delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="4" class="text-center">Data tidak ditemukan!</td>
                        @endif
                    </tbody>
                </table>
                </h1>
            </div>
        </div>
    </div>
</x-app-layout>
