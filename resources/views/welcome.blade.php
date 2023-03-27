<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div class="bg-white">
                <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                    <h2 class="">Products</h2>
                
                    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach ($products as $product)
                            <a href="#" class="group">
                                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                    @if ($product->file_path)
                                        <img src="{{asset('/storage/' .$product->file_path)}}" alt="{{ $product->name}}" class="h-48 w-full object-cover object-center group-hover:opacity-75">
                                    @else
                                        <img src="https://cdn-icons-png.flaticon.com/512/830/830484.png" alt="" class="h-48 w-full object-cover object-center group-hover:opacity-75">
                                    @endif
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700">{{$product->name}} by <sub>{{$product->user->name}}</sub> </h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">${{$product->price}}</p>
                                <p class="mt-1 text-lg font-medium text-gray-900">{{$product->description}}</p>

                            </a>
                        @endforeach
                        <!-- More products... -->
                    </div>
                </div>
            </div>
  
        </div>
    </body>
</html>
