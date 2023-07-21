<div class="p-6 border-t border-gray-200 md:border-l dark:border-gray-700">
    <div class="px-6 flex items-center">
        <x-skills-icon/>
        <div class="ml-4 text-lg text-gray-600 font-semibold flex items-center">
            @if($skills->isEmpty())
                <a href="#" class="dark:text-gray-100">Skills</a>&nbsp;
                <a href="{{ route('skills') }}">
                    <x-icons.edit/>
                </a>
            @else
                <a href="#" class="dark:text-gray-100">Skills ({{ count($skills) }})</a>&nbsp;
                <a href="{{ route('skills') }}">
                    <x-icons.edit/>
                </a>
            @endif
        </div>
    </div>

    <x-section-border/>

    <div class="py-6">
        {{--If Div element is not closed error displays, it is actually not an error. ive added a php condition to display different kinds of div classes based on the $skills status and its throwing the error only in the editor--}}
        <div
            @if($skills->isEmpty())
                class="flex text-gray-500 overflow-y-auto py-2 text-sm justify-center"
            style="white-space: nowrap"
            @else
                class="flex text-gray-500 overflow-y-auto py-2 text-sm"
            style="white-space: nowrap"
            @endif
        >
            @forelse($skills as $skill)
                @if($skill->years == 1)
                    <div
                        class="bg-indigo-500 font-semibold items-center mr-2 p-2 rounded-full text-center text-white"
                    >
                        {{ str_replace('_', ' ', strtoupper($skill->name)) }}
                        | {{ $skill->years }} year
                    </div>
                @else
                    <div
                        class="bg-indigo-500 font-semibold items-center mr-2 p-2 rounded-full text-center text-white"
                    >
                        {{ str_replace('_', ' ', strtoupper($skill->name)) }}
                        | {{ $skill->years }} years
                    </div>
                @endif
            @empty
                <x-icons.empty/>
                <div class="text-gray-400 flex">
                    &nbsp;Add some skills
                </div>
            @endforelse
        </div>
    </div>
</div>
