<div class="p-6 border-t border-gray-200 md:border-l dark:border-gray-700">
    <div class="flex items-center">
        <x-icons.projects/>
        <div class="ml-4 text-lg text-gray-600 font-semibold flex items-center">
            @if($projects->isEmpty())
                <a href="#" class="dark:text-gray-100">Projects</a>&nbsp;
                <a href="{{ route('projects') }}">
                    <x-icons.edit/>
                </a>
            @else
                <a href="#" class="dark:text-gray-100">Projects ({{ count($projects) }})</a>&nbsp;
                <a href="{{ route('projects') }}">
                    <x-icons.edit/>
                </a>
            @endif
        </div>
    </div>

    <x-section-border/>


    @if($projects->isEmpty())
        <div class="ml-12 p-6">
            <div class="text-sm text-gray-500">
                <div class="text-center text-gray-400 flex justify-center">
                    <x-icons.empty/>
                    &nbsp;Add your projects
                </div>
            </div>
        </div>
    @else
        @foreach($projects as $project)
            <div class="border p-6 rounded-lg shadow-md bg-white mb-4 mt-6 dark:bg-gray-700">
                <div class="text-sm text-gray-500">
                    <div>
                        @if($project->link)
                            <a href="{{ url($project->link) }}"
                               style="overflow: auto;"
                               class="flex justify-center dark:text-indigo-300 font-semibold text-indigo-600"
                               target="_blank">{{ ucwords($project->name) }}</a>
                        @else
                            <h2 class="text-gray-400 text-sm">{{ $project->name }}</h2>
                        @endif
                    </div>
                    <div>
                        <h2 class="text-center text-gray-400">{{ ucwords($project->type) }}</h2>
                    </div>
                    @if($project->description)
                        <div>
                            <h2 class="text-center text-gray-400">{{ $project->description }}</h2>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
