<section class='odd:bg-slate-50 py-14 px-1'>
    <div class="flex justify-center">
        <div class="w-fit mb-8">
            <h2 class="text-2xl font-medium underline underline-offset-8 decoration-orange-500">{{ $category->name }}
            </h2>
        </div>
    </div>
    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides">
                @foreach ($category->books as $book)
                    @include('components.book')
                @endforeach
            </div>
        </div>
    </div>
    <a href="{{ route('categories.show', $category->id) }}"
        class="block w-fit mx-auto bg-zinc-700 text-white text-xs rounded-md py-1.5 px-3 mt-5">SEE
        MORE</a>
</section>

{{-- <div class="glide">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            <li class="glide__slide">0</li>
            <li class="glide__slide">1</li>
            <li class="glide__slide">2</li>
            <li class="glide__slide">3</li>
            <li class="glide__slide">4</li>
            <li class="glide__slide">5</li>
        </ul>
    </div>
</div> --}}
