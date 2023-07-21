<div class="p-6 border-t border-gray-200 md:border-l dark:border-gray-700">
    <div class="flex items-center">
        <x-education-icon/>
        <div class="ml-4 text-lg text-gray-600 font-semibold">
            <div class="ml-4 text-lg text-gray-600 font-semibold flex items-center">
                @if($educations->isEmpty())
                    <a href="#" class="dark:text-gray-100">Education</a>&nbsp;
                    <a href="{{ route('education') }}">
                        <x-icons.edit/>
                    </a>
                @else
                    <a href="#" class="dark:text-gray-100">Education ({{ count($educations) }})</a>&nbsp;
                    <a href="{{ route('education') }}">
                        <x-icons.edit/>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <x-section-border/>

    <div class="py-6">
        <div class="text-sm text-gray-500">
            @if($educations->isEmpty())
                <div class="text-center text-gray-400 flex justify-center">
                    <x-icons.empty/>
                    &nbsp;Add your education
                </div>
            @else
                @foreach($educations as $education)
                    <div class="border p-6 rounded-lg shadow-md bg-white mb-4 dark:bg-gray-700">
                        <div class="text-sm text-gray-500">
                            <div
                                class="font-semibold text-center"
                                style="overflow: auto;">
                                <a class="dark:text-indigo-300 font-semibold text-indigo-600" target="_blank"
                                   href="{{ url($education->link) }}">{{ ucwords($education->school) }}
                                </a>
                            </div>
                            <div>
                                <h2 class="text-center text-gray-400">{{ ucwords($education->degree) }}
                                    in:</h2>
                            </div>
                            <div>
                                <h2 class="text-center text-gray-400">{{ ucwords($education->field) }}</h2>
                            </div>
                            <div>
                                <h2 class="text-center text-gray-400">
                                    @if($education->month_ended && $education->year_ended)
                                        Between {{ Carbon\Carbon::createFromFormat('m', $education->month_started)->format('F') }}
                                        {{ $education->year_started }}
                                        and {{ Carbon\Carbon::createFromFormat('m', $education->month_ended)->format('F') }}
                                        {{ $education->year_ended }}
                                    @else
                                        Started
                                        in {{ Carbon\Carbon::createFromFormat('m', $education->month_started)->format('F') }}
                                        {{ $education->year_started }} and currently in
                                        school.
                                    @endif
                                </h2>
                            </div>
                            <div>
                                <h2 class="text-center text-gray-400">
                                    In {{ ucwords($education->country) }}</h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
