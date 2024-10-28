@extends('components.template')

@section('content')
    @include('components.navbar')
    <div class="container mx-auto">
        <a href="{{ route('users.edit') }}"
            class="inline-block py-1.5 px-4 bg-red-500 hover:bg-red-600 text-white text-center mt-4 rounded-md">Edit</a>
        <table class="mt-4 w-full border-collapse">
            <thead>
                <tr>
                    <th class="bg-neutral-200 py-1.5 px-4 border-2">Title</th>
                    <th class="bg-neutral-200 py-1.5 px-4 border-2">Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currentUserData as $name => $value)
                    <tr class="even:bg-neutral-100 odd:bg-white">
                        <td class="py-1.5 px-4 border-2">{{ Str::replace('_', ' ', $name) }}</td>
                        <td class="py-1.5 px-4 border-2">
                            <span>{{ $value }}</span>
                            @if ($name === 'email')
                                <a href="#"
                                    class="inline-block py-0.5 px-2 text-sm bg-blue-500 hover:bg-blue-600 text-white text-center rounded-md">Verify</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
