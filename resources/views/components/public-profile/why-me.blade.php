@if($user->whyMe)
    <section  id="whyMe" class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12 justify-center">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                @if($user->whyMe->title)
                    <p class="font-semibold text-black">
                        {{ strtoupper($user->whyMe->title) }}
                    </p>
                @endif
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            @if($user->whyMe->description)
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink max-w-2xl">
                    <div class="flex-1 bg-white rounded-lg overflow-hidden shadow">
                        <div class="flex flex-wrap no-underline hover:no-underline">
                            <div class="font-bold p-6 text-gray-400 w-full">
                                {{ $user->whyMe->description }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endif
