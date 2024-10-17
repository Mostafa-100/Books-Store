<x-Template>
    <x-Navbar :categories="$categories" />
    <x-Section title="Hot deals">
        @foreach ($books as $book)
            <x-Book :id="$book->id" :title="$book->title" :author="$book->author->fullname" :price="$book->price" :coverUrl="$book->coverUrl" />
        @endforeach
    </x-Section>
    <x-Section title="Greate books">
        <i>Empty</i>
    </x-Section>
    <x-Section title="Amazing books">
        <i>Empty</i>
    </x-Section>
    <x-Subscribe />
    <x-Footer />
</x-Template>
