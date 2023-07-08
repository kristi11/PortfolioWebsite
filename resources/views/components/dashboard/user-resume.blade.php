<div class="py-6 border-t border-gray-200 md:border-l">
    <div class="flex items-center">
        <x-resume-dashdoard-icon/>
            <div class="ml-4 text-lg text-gray-600 font-semibold flex items-center">
                @if($resumes->isEmpty())
                    <a href="#" class="dark:text-gray-100">Resume</a>&nbsp;
                    <a href="{{ route('resume') }}">
                        <x-icons.edit/>
                    </a>
                @else
                    <a href="#" class="dark:text-gray-100">Resume &nbsp;
                    <a href="{{ route('resume') }}">
                        <x-icons.edit/>
                    </a>
                @endif
            </div>
    </div>

    <x-section-border/>

    <div class="py-6" style="white-space: nowrap">
        <div class="text-sm text-gray-500">
            @if($resumes->isempty())
                <div class="text-center text-gray-400 flex justify-center">
                    <x-icons.empty/>
                    &nbsp;Add your resume
                </div>
            @else
                @foreach($resumes as $resume)
                    <div
                            class="text-center font-mono font-semibold text-center py-2"
                            style="overflow: auto;">
                        <a href="{{ url($resume->resumeLink) }}"
                           class="dark:text-indigo-300 font-semibold text-indigo-600"
                           target="_blank">View</a> or
                        <x-secondary-button
                                wire:click="download({{ $resume->id }}, 'resume.pdf')"
                                class="mr-2"
                                title="Download resume">
                            Download
                        </x-secondary-button>
                        your resume
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
