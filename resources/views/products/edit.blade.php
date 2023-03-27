<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">{{ __('Price') }}</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-bold mb-2">{{ __('Quantity') }}</label>
                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">{{ __('Description') }}</label>
                <textarea
                name="description"
                placeholder="{{ __('Description') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('description', $product->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('products.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>