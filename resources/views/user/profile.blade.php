@extends('components.template')

@section('content')
    @include('components.navbar')

    @session('email.sent')
        <div class="bg-blue-500 py-1 px-3 mx-auto mt-2 w-fit text-white text-center">{{ $value }}</div>
    @endsession

    @session('update-success', 'verify.success')
        <div class="bg-green-500 p-3 text-white text-center">{{ $value }}</div>
    @endsession

    @if ($errors->any())
        <div class="bg-red-500 text-center text-white p-3">
            {{ $errors->first() }}
        </div>
    @endif

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
                            @if ($name === 'email' && !auth()->user()->hasVerifiedEmail())
                                <a href="{{ route('email.sendEmailVerify') }}"
                                    class="inline-block py-0.5 px-2 text-sm bg-blue-500 hover:bg-blue-600 text-white text-center rounded-md">Verify</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
