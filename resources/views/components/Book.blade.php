<div class="group">
    <a href="/" class="flex items-center flex-col text-center">
        <img src={{ asset('storage/book_covers/' . $coverUrl) }}>
        <h3 class="font-medium text-lg group-hover:underline">{{ $title }}</h3>
        <div class="font-light text-sm">{{ $author }}</div>
        <div class="font-medium">{{ $price }} DH</div>
    </a>
    <div class='flex flex-col items-center'>
        <a href="#"
            class="flex gap-x-1 w-fit border-2 border-orange-500 text-xs text-orange-500 rounded-md py-1 px-6 mt-4 hover:bg-orange-100 transition-colors">
            <span>ADD</span>
            <i class="fa-solid fa-basket-shopping"></i>
        </a>
        <a href="/" class="w-fit text-xs mt-4 text-neutral-500">
            <span>DETAILS</span>
            <i class="fa-solid fa-eye"></i>
        </a>
    </div>
</div>
