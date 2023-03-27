<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">{{ __('Price') }}</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-bold mb-2">{{ __('Quantity') }}</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">{{ __('Description') }}</label>
                <textarea
                name="description"
                placeholder="{{ __('Description') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            
            <x-primary-button class="mt-4">{{ __('Add') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>