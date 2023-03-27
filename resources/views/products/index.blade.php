<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">{{ __('Success') }}</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <a href="{{route('products.create')}}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Add') }}</a>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($products as $product)
                <div class="p-6 flex space-x-2">
                    <svg class="h-6 w-6 text-gray-600 -scale-x-100" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.41426 9.84705C3.81505 8.02453 3.08762 5.43048 3.00433 2.85964C5.78936 2.51869 8.65074 2.96646 10.6859 4.65508C12.8997 6.49188 14.723 9.59242 16.1 12.4359C16.5925 13.453 17.087 14.4712 17.6171 15.4696C17.7331 15.6878 17.9259 15.8554 18.1582 15.9398L21.4733 17.1453L19.5528 18.1056C19.3592 18.2024 19.2023 18.3593 19.1056 18.5528L18.1453 20.4734L16.9398 17.1583C16.8553 16.9261 16.6875 16.7332 16.4694 16.6171C15.4652 16.0837 14.4505 15.5652 13.4169 15.0911C13.406 15.0861 13.395 15.0813 13.3839 15.0767C11.3311 14.2231 9.2177 12.9895 7.57493 11.7628C7.99112 11.6821 8.40082 11.5655 8.79409 11.4131C10.1056 10.9048 11.319 9.95954 11.9057 8.50889C12.1127 7.99689 11.8655 7.41398 11.3535 7.20692C10.8415 6.99986 10.2586 7.24706 10.0516 7.75906C9.72347 8.5703 9.01207 9.18367 8.07132 9.54829C7.22681 9.8756 6.26577 9.97211 5.41426 9.84705ZM24.3417 16.0602L19.2072 14.1931C18.9918 13.7753 18.5823 12.9687 17.9994 11.7691C18.021 11.2121 18.2265 10.7656 18.518 10.4674C18.8352 10.1428 19.3031 9.94129 19.9102 9.996C20.2925 10.0304 20.6608 9.84307 20.8579 9.51377C21.0551 9.18448 21.0464 8.77139 20.8356 8.45068C18.8889 5.48973 15.1688 3.42052 11.7315 2.93007C8.88421 0.718498 5.07406 0.434734 1.82403 1.01564C1.35506 1.09946 1.01033 1.50248 1.00021 1.97878C0.933709 5.10597 1.69387 8.66535 3.9411 11.2004C4.14544 12.8947 4.92442 14.4889 5.87842 15.8769C6.90484 17.3702 8.18179 18.6943 9.32578 19.7386C9.62461 20.0114 10.0584 20.0772 10.4247 19.9054C10.791 19.7335 11.0177 19.3579 10.9989 18.9537C10.9675 18.2765 11.1801 17.7858 11.4862 17.4773C11.7629 17.1986 12.1855 16.9985 12.7666 16.9939C13.6508 17.4069 14.6733 17.9337 15.1922 18.205L17.0602 23.3418C17.1967 23.7173 17.5437 23.9755 17.9426 23.9984C18.3415 24.0213 18.7157 23.8046 18.8944 23.4473L20.7453 19.7454L24.4472 17.8945C24.8046 17.7158 25.0213 17.3415 24.9983 16.9426C24.9754 16.5437 24.7172 16.1968 24.3417 16.0602ZM18.1672 8.31336C17.6246 8.55851 17.1502 8.94056 16.7915 9.41299C16.1134 8.18213 15.3394 6.93278 14.4689 5.78948C15.8591 6.40075 17.1589 7.27059 18.1672 8.31336ZM7.52665 14.744C7.30038 14.4148 7.09243 14.0827 6.90613 13.7491C7.94983 14.4885 9.11855 15.2057 10.3187 15.8382C9.93219 16.1582 9.61624 16.5636 9.39611 17.0147C8.72981 16.3169 8.0818 15.5517 7.52665 14.744ZM7.5 7.00003C8.32843 7.00003 9 6.32846 9 5.50003C9 4.6716 8.32843 4.00003 7.5 4.00003C6.67157 4.00003 6 4.6716 6 5.50003C6 6.32846 6.67157 7.00003 7.5 7.00003Z" fill="#000000"></path> </g></svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $product->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $product->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($product->created_at->eq($product->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($product->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('products.edit', $product)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('products.destroy', $product)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                        <p class="mt-4 mb-4 text-lg text-gray-900 ">{{ $product->description }}</p>
                        <h4 class="text-sm">
                            {{ __('Price') }}: {{ $product->price }} {{ __('USD') }}
                        
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $product->quantity }} {{ __('kg in stock') }}
                            </span>
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>