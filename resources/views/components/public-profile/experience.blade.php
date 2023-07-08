@if($user->experience->count() > 0)
    <section id="experience" class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12 justify-center">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Experience
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            @foreach($user->experience as $experience)
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink max-w-2xl">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                            {{ strtoupper($experience->type) }}
                        </p>
                        <p class="w-full text-gray-600 text-xs md:text-sm px-6 italic">
                            @if($experience->link)
                                <a class="font-semibold text-indigo-700" target="_blank"
                                   href="{{ url($experience->link) }}">
                                    {{ ucwords($experience->company) }}
                                </a>
                            @else
                                {{ ucwords($experience->company) }}
                            @endif
                        </p>
                        <div class="w-full font-bold text-xl text-gray-800 px-6">
                            {{ ucwords($experience->position) }}
                        </div>
                        <p class="text-gray-800 text-base px-6 mb-5">
                            {{ $experience->description }}
                        </p>
                        <div class="italic mb-5 px-6 text-gray-400 text-xs">
                            @if($experience->month_end && $experience->year_end)
                                Between {{ Carbon\Carbon::createFromFormat('m', $experience->month_start)->format('F') }}
                                {{ $experience->year_start }}
                                and {{ Carbon\Carbon::createFromFormat('m', $experience->month_end)->format('F') }}
                                {{ $experience->year_end }}
                            @else
                                Started
                                in {{ Carbon\Carbon::createFromFormat('m', $experience->month_start)->format('F') }}
                                {{ $experience->year_start }} and currently working here.
                            @endif
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endif