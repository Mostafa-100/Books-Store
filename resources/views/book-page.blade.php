<x-Template>
    <x-Navbar :categories="$categories" />
    <div class="py-8 bg-neutral-100">
        <div class="container mx-auto mt-7">
            <div class="flex justify-center items-center gap-9">
                <div>
                    <div>
                        <img src={{ asset('storage/book_covers/' . $book->coverUrl) }} class="max-w-80">
                    </div>
                    <div>
                        <a href="#"
                            class="py-1.5 px-5 w-fit mt-3 mx-auto bg-transparent text-orange-500 text-sm flex gap-x-3 border-2 border-orange-500 rounded-md text-center items-center">
                            <span>READ AN EXCERPT</span>
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h2 class="font-medium text-xl mb-3">{{ $book->title }}</h2>
                    <p class="mb-3">By <b>{{ $book->author->fullname }}</b></p>
                    <p class="mb-3">Category: </p>
                    <p class="text-3xl font-semibold">{{ $book->price }}</p>
                    <a href="#"
                        class="bg-orange-400 text-sm flex gap-x-2 w-fit rounded-md hover:bg-orange-500 cursor-pointer py-1.5 px-5 mt-4">
                        <span>ADD TO CART</span>
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8">
        <div class="container mx-auto">
            <div class="flex gap-5">
                <div class="grow">
                    <div>
                        <h2 class="font-medium text-xl mb-3">About {{ $book->title }}</h2>
                        <div class="text-sm">{{ $book->about }}</div>
                    </div>
                    <div class="mt-3">
                        <h2 class="font-medium text-xl mb-3">Prises for {{ $book->title }}</h2>
                    </div>
                </div>
                <div class="basis-1/3">
                    <h2 class="font-medium text-xl mb-3">About {{ $book->author->fullname }}</h2>
                    <div class="text-sm">{{ $book->author->about }}</div>
                    <div class="bg-neutral-200 p-3 shadow-md w-fit mt-3">
                        <h2 class="font-medium text-xl mb-3">Product details</h2>
                        <p class="text-sm">ISBN <b>{{ $book->isbn }}</b></p>
                        <p class="text-sm">Published by <b>{{ $book->publisher->name }}</b></p>
                        <p class="text-sm"><b>{{ $book->publishDate }} | {{ $book->numberOfPages }} pages</b></b>
                        <p class="text-sm">Dimensions <b>{{ $book->dimensions }}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-Subscribe />
    <x-Footer />
</x-Template>
