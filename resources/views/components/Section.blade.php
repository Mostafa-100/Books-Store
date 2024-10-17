<section class='odd:bg-slate-50 py-14 px-1'>
    <div class="flex justify-center">
        <div class="w-fit mb-8">
            <h2 class="text-2xl font-medium underline underline-offset-8 decoration-orange-500">{{ $title }}</h2>
            {{-- <div class="bg-orange-500 w-full h-1.5"></div> --}}
        </div>
    </div>
    <div class="grid xl:grid-cols-8 gap-2">
        {{ $slot }}
    </div>
    <a href="#" class="block w-fit mx-auto bg-zinc-700 text-white text-xs rounded-md py-1.5 px-3 mt-5">SEE MORE</a>
</section>
