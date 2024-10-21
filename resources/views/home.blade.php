<x-Template>
    <x-Navbar :categories="$categories" />
    @if (session()->has('login-success'))
        <div class="bg-green-500 w-fit mt-3 p-2 mx-auto text-white text-center">{{ session('login-success') }}</div>
    @endif
    <x-Section title="Hot deals">
        @foreach ($categories->firstWhere('name', 'HOT DEALS')->books as $book)
            <x-Book :id="$book->id" :title="$book->title" :author="$book->author->fullname" :price="$book->price" :coverUrl="$book->coverUrl" />
        @endforeach
        <x-slot:more>
            <a href="{{ route('categories.show', $categories->firstWhere('name', 'HOT DEALS')->id) }}"
                class="block w-fit mx-auto bg-zinc-700 text-white text-xs rounded-md py-1.5 px-3 mt-5">SEE
                MORE</a>
        </x-slot:more>
    </x-Section>
    <x-Section title="BUSINESS">
        @foreach ($categories->firstWhere('name', 'BUSINESS')->books as $book)
            <x-Book :id="$book->id" :title="$book->title" :author="$book->author->fullname" :price="$book->price" :coverUrl="$book->coverUrl" />
        @endforeach
        <x-slot:more>
            <a href="{{ route('categories.show', $categories->firstWhere('name', 'BUSINESS')->id) }}"
                class="block w-fit mx-auto bg-zinc-700 text-white text-xs rounded-md py-1.5 px-3 mt-5">SEE
                MORE</a>
        </x-slot:more>
    </x-Section>
    <x-Section title="FICTION">
        @foreach ($categories->firstWhere('name', 'FICTION')->books as $book)
            <x-Book :id="$book->id" :title="$book->title" :author="$book->author->fullname" :price="$book->price" :coverUrl="$book->coverUrl" />
        @endforeach
        <x-slot:more>
            <a href="{{ route('categories.show', $categories->firstWhere('name', 'FICTION')->id) }}"
                class="block w-fit mx-auto bg-zinc-700 text-white text-xs rounded-md py-1.5 px-3 mt-5">SEE
                MORE</a>
        </x-slot:more>
    </x-Section>
    <x-Subscribe />
    <x-Footer />
</x-Template>
