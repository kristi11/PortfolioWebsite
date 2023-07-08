@if($user->certificate->count() > 0)
    <section id="certificate" class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12 justify-center">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Certificates
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            @foreach($user->certificate as $certificate)
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink max-w-2xl">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <div class="flex flex-wrap no-underline hover:no-underline">
                            <p class="w-full text-gray-400 text-xs md:text-sm px-6 pt-3">
                                {{ strtoupper($certificate->organization) }}
                            </p>
                            <div class="w-full text-gray-600 text-xs md:text-sm px-6">
                                @if($certificate->credentialURL)
                                    <a class="font-semibold text-indigo-700" target="_blank"
                                       href="{{ url($certificate->credentialURL) }}">
                                        {{ ucwords($certificate->name) }}
                                    </a>
                                @else
                                    <p class="font-semibold text-black">
                                    {{ ucwords($certificate->name) }}
                                    </p>
                                @endif
                            </div>
                            @if($certificate->credentialID)
                                <div class="px-6 text-gray-400 w-full">
                                    ID: {{ ucwords($certificate->credentialID) }}
                                </div>
                            @endif
                            <p class="text-gray-800 text-base px-6 mb-5">
                                {{ $certificate->description }}
                            </p>
                            <div class="italic mb-5 px-6 text-gray-400 text-xs">
                                @if($certificate->month_ended && $certificate->year_ended)
                                    Between {{ Carbon\Carbon::createFromFormat('m', $certificate->month_started)->format('F') }}
                                    {{ $certificate->year_started }}
                                    and {{ Carbon\Carbon::createFromFormat('m', $certificate->month_ended)->format('F') }}
                                    {{ $certificate->year_ended }}
                                @else
                                    Started
                                    in {{ Carbon\Carbon::createFromFormat('m', $certificate->month_started)->format('F') }}
                                    {{ $certificate->year_started }}. This certificate does not expire.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif