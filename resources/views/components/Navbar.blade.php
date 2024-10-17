@props(['categories'])

<nav>
    <div class="container mx-auto">
        <div class="py-4">
            <div class="flex gap-4 justify-end">
                <button class="flex items-center gap-x-1">
                    <img class="w-4" src={{ asset('uk.png') }}>
                    <span class="text-xs">ENGLISH</span>
                </button>
                <a href="#" class="flex items-center gap-x-1">
                    <i class="fa-solid fa-user"></i>
                    <span class="text-xs">MY ACCOUNT</span>
                </a>
            </div>
            <div class="flex items-center justify-between gap-x-16">
                <div>
                    <a href="{{ route('home') }}"><img class="w-28" src={{ asset('logo.png') }}></a>
                </div>
                <form method="GET" action="{{ route('search') }}" class="grow">
                    <div class="flex items-center shadow-sm shadow-neutral-500 grow rounded-md self-end h-10 px-2 mt-3">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" name='keyword' placeholder="Search by Title, Author, ISBN"
                            class="px-2 grow h-full focus:outline-none">
                    </div>
                    @if (session()->has('searchNotFoundError'))
                        <p class="text-red-500 text-sm">{{ session('searchNotFoundError') }}</p>
                    @endif
                </form>
                <div>
                    <a href="flex items-center gap-x-1">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <span class="text-xs">MY CART</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-orange-500 p-px">
        <div class="container mx-auto text-sm font-medium">
            @foreach ($categories as $category)
                <x-Category :id="$category->id">{{ $category->name }}</x-Category>
            @endforeach
        </div>
    </div>
</nav>
