@if($user->services->count() > 0)
    <section id="services" class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                What i do
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="gap-6 grid lg:grid-cols-3 md:grid-cols-2 md:m-3">
                @foreach($user->services as $service)
                    <div class="flex justify-center text-center col-span-1 mb-6">
                        <div class="p-6 md:rounded-xl shadow-lg">
                            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-6">
                                {{$service->name}}
                            </h3>
                            <p class="text-gray-600 mb-8">
                                {{$service->description}}
                                <br />
                                <br />
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
