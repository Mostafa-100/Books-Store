@extends('components.template')

@section('content')
    @include('components.Navbar')

    @if (session()->has('login-success'))
        <div class="bg-green-500 w-fit mt-3 p-2 mx-auto text-white text-center">{{ session('login-success') }}</div>
    @endif

    @each('components.section', $homeCategories, 'category')

    @include('components.subscribe')

    @include('components.footer')
@endsection
