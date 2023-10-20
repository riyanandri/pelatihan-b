<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fitur Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('post.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="grid gap-6 mb-6">
                    <div>
                        <label for="judul" class="black mb-2 text-sm font-medium text-gray-900">Judul</label>
                        <input type="text" name="judul" value="{{ $data->judul }}"
                            class="bg-gray-50 border border-gray-300
                                text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                    </div>
                    <div>
                        <label for="deskripsi" class="black mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <input type="text" name="deskripsi" value="{{ $data->deskripsi }}"
                            class="bg-gray-50 border border-gray-300
                            text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                    </div>
                </div>
                <button type="submit"
                    class="mb-3 text-white text-center font-medium bg-blue-700 hover:bg-blue-500 fokus:ring-blue-300 rounded-lg sm:w-auto px-5 py-2.5">
                    Update
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
