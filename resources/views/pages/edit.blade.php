<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Page') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Geri linki (opsiyonel) -->
            <div class="mb-4">
                <a href="{{ route('admin.pages.index') }}" class="text-blue-500 hover:underline">
                    &larr; Geri dön
                </a>
            </div>

            <!-- Form Kartı -->
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Dikkat: method="POST" + @method('PUT') -->
                <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="title">
                            Title
                        </label>
                        <input type="text" name="title" id="title"
                            class="block w-full border-gray-300 rounded-md shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            value="{{ old('title', $page->title) }}" required />
                    </div>

                    <!-- Slug -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="slug">
                            Slug
                        </label>
                        <input type="text" name="slug" id="slug"
                            class="block w-full border-gray-300 rounded-md shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            value="{{ old('slug', $page->slug) }}" required />
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="content">
                            Content
                        </label>
                        <textarea name="content" id="content" rows="6"
                            class="block w-full border-gray-300 rounded-md shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('content', $page->content) }}</textarea>
                    </div>

                    <!-- Kaydet / Güncelle Butonu -->
                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-white bg-red-600 border border-transparent
         rounded-md font-semibold text-xs uppercase tracking-widest
         hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900
         focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Kaydet
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
