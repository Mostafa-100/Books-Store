@extends('components.template')

@section('content')
    @include('components.navbar')
    <div>
        @if (!$books->isEmpty())
            <h1 class="text-2xl text-center mt-4 font-medium underline underline-offset-8 decoration-orange-500 mb-5">
                The results for {{ $keyword }}
            </h1>
            <div class="grid grid-cols-8">
                @each('components.book', $books, 'book')
            </div>
        @else
            <p class="text-center text-xl mt-5 text-neutral-500">No results found for the provided keyword</p>
        @endif
    </div>
@endsection
