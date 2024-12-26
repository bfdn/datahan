<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pages List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-6">
                <!-- Tablo -->
                <table class="w-full text-left text-sm text-gray-500 border border-gray-200">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 font-medium text-gray-700 uppercase tracking-wider border-r border-gray-200">
                                Slug
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <!-- Boşluk (Aksiyon sütunu) -->
                            </th>
                        </tr>
                    </thead>
                    <!-- Satırlar arası çizgiler için 'divide-y divide-gray-200' ekliyoruz -->
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($pages as $page)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">
                                    {{ $page->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">
                                    {{ $page->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">
                                    {{ $page->slug }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <a href="{{ route('admin.pages.edit', $page->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Düzenle
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /Tablo -->
            </div>
        </div>
    </div>
</x-app-layout>
