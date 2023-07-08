<div class="p-6 border-t border-gray-200 md:border-l">
    <div class="flex items-center">
        <x-icons.work-experience/>
        <div class="ml-4 text-lg text-gray-600 font-semibold flex items-center">
            @if($experiences->isEmpty())
                <a href="#" class="dark:text-gray-100">Experience</a>&nbsp;
                <a href="{{ route('experience') }}">
                    <x-icons.edit/>
                </a>
            @else
                <a href="#" class="dark:text-gray-100">Experience ({{ count($experiences) }})</a>&nbsp;
                <a href="{{ route('experience') }}">
                    <x-icons.edit/>
                </a>
            @endif
        </div>
    </div>

    <x-section-border/>


    @if($experiences->isEmpty())
        <div class="p-6">
            <div class="text-sm text-gray-500">
                <div class="text-center text-gray-400 flex justify-center">
                    <x-icons.empty/>
                    &nbsp;Add your experience
                </div>
            </div>
        </div>
    @else
        @foreach($experiences as $experience)
            <div class="border p-6 rounded-lg shadow-md bg-white mb-4 mt-6 dark:bg-gray-700">
                <div class="text-sm text-gray-500">
                    <div
                            class="font-semibold text-center"
                            style="overflow: auto;">
                        {{ ucwords($experience->position) }}
                    </div>
                    <div>
                        <h2 class="text-center text-gray-400">{{ ucwords($experience->type) }}</h2>
                    </div>
                    @if($experience->description)
                        <div>
                            <h2 class="text-center text-gray-400">{{ $experience->description }}</h2>
                        </div>
                    @endif
                    <div>
                        <h2 class="text-center text-gray-400">
                            @if($experience->link)
                                At <a
                                        class="dark:text-indigo-300 font-semibold text-indigo-600 text-center"
                                        target="_blank"
                                        href="{{ url($experience->link) }}">
                                    {{ ucwords($experience->company) }}
                                </a>
                            @else
                                At {{ ucwords($experience->company) }}
                            @endif
                        </h2>
                    </div>
                    <div>
                        <h2 class="text-center text-gray-400">
                            @if($experience->month_end && $experience->year_end)
                                Between {{ Carbon\Carbon::createFromFormat('m', $experience->month_start)->format('F') }}
                                {{ $experience->year_start }}
                                and {{ Carbon\Carbon::createFromFormat('m', $experience->month_end)->format('F') }}
                                {{ $experience->year_end }}
                            @else
                                Started
                                in {{ Carbon\Carbon::createFromFormat('m', $experience->month_start)->format('F') }}
                                {{ $experience->year_start }} and currently
                                working here.
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
