<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Site Ayarları - İletişim') }}
        </h2>
    </x-slot>

    <div class="py-8 mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-md">

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf


                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="map">
                        Harita Kodu (iframe vb.)
                    </label>
                    <textarea name="map" id="map" rows="4"
                        class="block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500">{{ old('map', $setting->map) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="phone">
                        Telefon
                    </label>
                    <input type="text" name="phone" id="phone"
                        class="block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500"
                        value="{{ old('phone', $setting->phone) }}" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="address">
                        Adres
                    </label>
                    <textarea name="address" id="address" rows="2"
                        class="block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500">{{ old('address', $setting->address) }}</textarea>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-white bg-red-600 border border-transparent
rounded-md font-semibold text-xs uppercase tracking-widest
hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900
focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Kaydet
                </button>
            </form>
        </div>
    </div>



</x-app-layout>
