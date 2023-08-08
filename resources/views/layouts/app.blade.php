
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haghani.com</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">

<!-- Top Bar Nav -->
<nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                <li><a class="hover:text-gray-200 hover:underline px-4" href="">Shop</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{route('aboutUs')}}">About</a></li>
            </ul>
        </nav>
</nav>

<!-- Text Header -->
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <p class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
           {!! \App\Models\TextWidget::getTitle('header') !!}
        </p>
        <p class="text-lg text-gray-600">
            {!! \App\Models\TextWidget::getContent('header') !!}

        </p>
    </div>
</header>
<!-- Topic Nav -->
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a
            href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open"
        >
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            <a href="{{route('home')}}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Home</a>
        @foreach(\App\Models\Category::all() as $category)
                <a href="{{route('by-category' , $category)}}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{$category->category_name}}</a>
            @endforeach
            <a href="{{route('aboutUs')}}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">About Us</a>

            @if (Route::has('login'))
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>                @else
                        @if (Route::has('register'))
                        <a href="{{ route('login') }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Log in</a>

                        <a href="{{ route('register') }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Register</a>
                        @endif
                    @endauth
                </div>
        @endif



        </div>
    </div>
</nav>
<div class="container mx-auto flex flex-wrap py-6">
    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        {{$slot}}
        <!-- Pagination -->

    </section>
    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">{!! \App\Models\TextWidget::getTitle('about-us') !!}</p>
            <a href="{{route('aboutUs')}}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>
    </aside>
</div>
<footer class="w-full border-t bg-white pb-12">

    <div class="w-full container mx-auto flex flex-col items-center">
        <div class="uppercase pb-6">&copy; {!! \App\Models\TextWidget::getTitle('footer') !!}
        </div>
    </div>
</footer>

</body>
</html>
{{--<div--}}
{{--    class="relative w-full flex items-center invisible md:visible md:pb-12"--}}
{{--    x-data="getCarouselData()"--}}
{{-->--}}
{{--    <button--}}
{{--        class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"--}}
{{--        x-on:click="decrement()">--}}
{{--        &#8592;--}}
{{--    </button>--}}
{{--    <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">--}}
{{--        <img class="w-1/6 hover:opacity-75" :src="image">--}}
{{--    </template>--}}
{{--    <button--}}
{{--        class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"--}}
{{--        x-on:click="increment()">--}}
{{--        &#8594;--}}
{{--    </button>--}}
{{--</div>--}}
