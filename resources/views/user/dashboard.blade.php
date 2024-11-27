<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @section('content')
    <div>
        <h1 class="font-bold text-slate-100 text-3xl m-12 px-2 border-b-2 border-gray-600">
            Neque Porro Quisquam Est Qui Dolorem
        </h1>
        <div class="bg-gray-900 text-slate-100 m-12 p-8 rounded-lg border-2 border-gray-100 shadow-[16px_16px_0px_rgba(0,0,0,0.5),_18px_18px_0px_rgba(255,255,255,0.3)]">
            <h2 class="font-bold text-2xl">About Us</h2>
            <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos 
                qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, 
                adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
            </p>
        </div>
    {{--ELI: nanti ganti dengan text dari adminnya--}}
        <div class="w-full relative">
            <h1 class="text-slate-100 text-2xl font-semi-bold w-1/2 ml-12 text-left">
                Our Client
            </h1>

            {{-- FADE EFFECT (Gradient Overlay) --}}
            <div class="absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-gray-900 to-transparent pointer-events-none z-10"></div>
            <div class="absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-gray-900 to-transparent pointer-events-none z-10"></div>

            {{-- CONTENT --}}
            <div class="flex overflow-hidden relative z-0">
                <div class="flex animate-scroll-auto">
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                </div>
                <div class="flex animate-scroll-auto">
                {{-- Duplicate Content --}}
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                    <span class="bg-gray-200 m-2 h-28 w-64 flex items-center justify-center shrink-0 rounded-lg">
                        img
                    </span>
                </div>
            </div>
        </div>

    </div>

    @endsection
</x-app-layout>
