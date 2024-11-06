<nav>
    <div class="container mx-auto">
        <div class="py-4">
            <div class="flex gap-4 justify-end">
                <button class="flex items-center gap-x-1">
                    <img class="w-4" src={{ asset('uk.png') }}>
                    <span class="text-xs">ENGLISH</span>
                </button>
                <a href={{ route('users.show') }} class="flex items-center gap-x-1">
                    <i class="fa-solid fa-user"></i>
                    <span class="text-xs">MY ACCOUNT</span>
                </a>
                @auth
                    <a href={{ route('logout') }} class="flex items-center gap-x-1">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span class="text-xs">LOGOUT</span>
                    </a>
                @endauth
            </div>
            <div class="flex items-center justify-between gap-x-16">
                <div>
                    <a href={{ route('home') }}><img class="w-28" src={{ asset('logo.png') }}></a>
                </div>
                <form method="GET" action={{ route('search') }} class="grow">
                    <div class="flex items-center shadow-sm shadow-neutral-500 grow rounded-md self-end h-10 px-2 mt-3">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" name='keyword' placeholder="Search by Title"
                            class="px-2 grow h-full focus:outline-none">
                    </div>
                    @error('keyword')
                        <div class="text-red-500 text-sm">{{ $errors->first() }}</div>
                    @enderror
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
            @each('components.category', $categories, 'category')
        </div>
    </div>
</nav>
