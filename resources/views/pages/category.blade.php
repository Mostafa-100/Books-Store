@extends('components.template')

@section('content')
    @include('components.navbar')
    <div>
        <h1 class="text-2xl text-center mt-4 font-medium underline underline-offset-8 decoration-orange-500 mb-5">
            {{ $category->name }}
        </h1>
        <div class="grid grid-cols-8">
            @each('components.book', $category->books, 'book')
        </div>
    </div>
@endsection
