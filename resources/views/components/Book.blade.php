<div class="glide__slide group shadow-lg p-1" title="{{ $book->title }}">
    <a href="{{ route('books.show', $book->id) }}" class="flex items-center flex-col text-center">
        <img src="{{ asset('storage/book_covers/' . $book->coverUrl) }}">
        <h3 class="font-medium text-lg group-hover:underline">{{ Str::words($book->title, 2) }}</h3>
        <div class="font-light text-sm">{{ $book->author->fullname }}</div>
        <div class="font-medium">{{ $book->price }} DH</div>
    </a>
    <div class='flex flex-col items-center'>
        @if (!$book->carts->isEmpty() || in_array($book->id, session('cart') ?? []))
            <button data-book-id="{{ $book->id }}" disabled
                class="flex gap-x-1 w-fit border-2 border-orange-500 disabled:border-neutral-300 text-xs enabled:text-orange-500 disabled:text-neutral-600 rounded-md py-1 px-6 mt-4 enabled:hover:bg-orange-100 enabled:transition-colors disabled:bg-neutral-300">
                <span>ADDED</span>
            </button>
        @else
            <button data-book-id="{{ $book->id }}"
                class="flex gap-x-1 w-fit border-2 border-orange-500 disabled:border-neutral-300 text-xs enabled:text-orange-500 disabled:text-neutral-600 rounded-md py-1 px-6 mt-4 enabled:hover:bg-orange-100 enabled:transition-colors disabled:bg-neutral-300">
                <span>ADD</span>
                <i class="fa-solid fa-basket-shopping"></i>
            </button>
        @endif
        <a href="{{ route('books.show', $book->id) }}" class="w-fit text-xs mt-4 text-neutral-500">
            <span>DETAILS</span>
            <i class="fa-solid fa-eye"></i>
        </a>
    </div>
</div>
