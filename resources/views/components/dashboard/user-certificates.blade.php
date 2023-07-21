<div class="p-6 border-t border-gray-200 md:border-l dark:border-gray-700">
    <div class="flex items-center">
        <x-icons.certificates/>
        <div class="ml-4 text-lg text-gray-600 font-semibold flex items-center">
            @if($certificates->isEmpty())
                <a href="#" class="dark:text-gray-100">Certificate</a>&nbsp;
                <a href="{{ route('certificates') }}">
                    <x-icons.edit/>
                </a>
            @else
                <a href="#" class="dark:text-gray-100">Certificate ({{ count($certificates) }})</a>&nbsp;
                <a href="{{ route('certificates') }}">
                    <x-icons.edit/>
                </a>
            @endif
        </div>
    </div>

    <x-section-border/>

    @if($certificates->isEmpty())
        <div class="p-6">
            <div class="text-gray-500 text-center">
                <div
                    class="text-center text-gray-400 flex justify-center text-sm">
                    <x-icons.empty/>
                    &nbsp;Add your certificates
                </div>
            </div>
        </div>
    @else
        @foreach($certificates as $certificate)
            <div class="border p-6 rounded-lg shadow-md bg-white mb-4 mt-6 dark:bg-gray-700">
                <div class="text-gray-400 text-center">
                    <div>
                        @if($certificate->credentialURL)
                            <a href="{{ url($certificate->credentialURL) }}"
                               class="dark:text-indigo-300 font-semibold text-indigo-600 text-sm text-center"
                               target="_blank">{{ ucwords($certificate->name) }}</a>
                        @else
                            <h2 class="text-gray-400 text-sm">{{ $certificate->name }}</h2>
                        @endif
                    </div>
                    <div>
                        <h2 class="text-gray-400 text-sm">
                            At {{ $certificate->organization }}</h2>
                    </div>
                    @if($certificate->description)
                        <div>
                            <h2 class="text-center text-sm">{{ $certificate->description }}</h2>
                        </div>
                    @endif
                    <div>
                        <h2 class="text-gray-400 text-sm">
                            @if($certificate->month_ended && $certificate->year_ended)
                                Between {{ Carbon\Carbon::createFromFormat('m', $certificate->month_started)->format('F') }}
                                {{ $certificate->year_started }}
                                and {{ Carbon\Carbon::createFromFormat('m', $certificate->month_ended)->format('F') }}
                                {{ $certificate->year_ended }}.
                            @else
                                Obtained
                                in {{ Carbon\Carbon::createFromFormat('m', $certificate->month_started)->format('F') }}
                                {{ $certificate->year_started }}. This
                                certificate doesn't
                                expire
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
