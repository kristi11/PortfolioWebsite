@if($user->education->count() > 0)
    <section id="education" class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12 justify-center">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Education
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            @foreach($user->education as $education)
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink max-w-2xl">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <div class="flex flex-wrap no-underline hover:no-underline">
                            <div class="w-full text-gray-400 text-xs md:text-sm px-6 pt-3">
                                @if($education->link)
                                    <a class="font-semibold text-indigo-700" target="_blank"
                                       href="{{ url($education->link) }}">
                                        {{ strtoupper($education->school) }}
                                    </a>
                            @else
                                <p class="font-semibold text-black">
                                    {{ strtoupper($education->school) }}
                                </p>
                                @endif
                            </div>
                            <div class="px-6 text-gray-400 w-full">
                                {{ ucwords($education->degree) }} in
                            </div>
                            <div class="w-full text-gray-600 text-xs md:text-sm px-6">
                                    <p class="font-semibold text-black">
                                        {{ ucwords($education->field) }}
                                    </p>
                            </div>
                            <div class="px-6 text-gray-400 w-full text-sm">
                                in {{ ucwords($education->country) }}
                            </div>
                            <div class="italic px-6 mb-5 text-gray-400 text-xs">
                                @if($education->month_ended && $education->year_ended)
                                    Between {{ Carbon\Carbon::createFromFormat('m', $education->month_started)->format('F') }}
                                    {{ $education->year_started }}
                                    and {{ Carbon\Carbon::createFromFormat('m', $education->month_ended)->format('F') }}
                                    {{ $education->year_ended }}
                                @else
                                    Started
                                    in {{ Carbon\Carbon::createFromFormat('m', $education->month_started)->format('F') }}
                                    {{ $education->year_started }} and still studying.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif