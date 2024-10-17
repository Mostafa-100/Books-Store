<x-Template>
    <x-Navbar :categories="$categories" />
    <div>
        <h1 class="text-2xl text-center mt-4 font-medium underline underline-offset-8 decoration-orange-500 mb-5">
            {{ $category->name }}
        </h1>
        <div class="grid grid-cols-8">
            @foreach ($category->books as $book)
                <x-Book :id="$book->id" :title="$book->title" :author="$book->author->fullname" :price="$book->price" :coverUrl="$book->coverUrl" />
            @endforeach
        </div>
    </div>
</x-Template>
