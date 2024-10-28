<x-template>
    @error('email')
        <div class="bg-red-500 p-3 text-white text-center">{{ $message }}</div>
    @enderror

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src={{ asset('logo.png') }} alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Reset your password
            </h2>
        </div>

        <div class="mt-3 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action={{ route('password.update') }} method="POST">
                @csrf
                <input type="hidden" name="token" value={{ $token }}>
                <input type="hidden" name="email" value={{ $email }}>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Enter
                        your new password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required
                            class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="re-password" class="block text-sm font-medium leading-6 text-gray-900">Re-type
                        your password</label>
                    <div class="mt-2">
                        <input id="re-password" name="password_confirmation" type="password" required
                            class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-orange-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Reset</button>
                </div>
            </form>
        </div>
    </div>

</x-template>
