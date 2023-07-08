<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <div>
        <img class="h-20 w-20 rounded-full object-cover"
             src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"/>
    </div>

    <div class="mt-8 text-2xl">
        {{ ucwords($user->name) }}
    </div>

    <div class="flex overflow-y-auto items-center">
        <div class="text-gray-500">
            @if($user->stackoverflow_link)
                <x-icons.profile-stackoverflow-svg/>
            @endif
        </div>

        <div class="text-gray-500 mr-2">
            @if($user->github_link)
                <x-icons.profile-github-svg/>
            @endif
        </div>

        <div class="text-gray-500">
            @if($user->linkedin_link)
                <x-icons.profile-linkedin-svg/>
            @endif
        </div>
    </div>

    <div class="text-gray-500 flex items-center overflow-y-auto" style="white-space: nowrap">
        <p class="font-semibold mr-2">Username: </p>
        @if($user)
            {{ $user->username }}
        @else
            <div class="text-gray-400 text-sm flex">
                Add username
            </div>
        @endif
    </div>
    <div class="text-gray-500 flex items-center overflow-y-auto" style="white-space: nowrap">

        <div class="text-gray-500 flex items-center">
            <p class="font-semibold mr-2">E-mail: </p>
            @if($user)
                {{ $user->email }}
            @else
                <div class="text-gray-400 text-sm flex">
                    Add email
                </div>
            @endif
        </div>
    </div>

    @if($user->role == 'developer')
        <div class="text-gray-500 flex overflow-y-auto" style="white-space: nowrap">
            <p class="font-semibold mr-2">Interest: </p>
            @if(!$user->interest)
                <div class="text-gray-400 text-sm flex">
                    Add a job interest
                </div>
            @else
                {{ ucwords(str_replace("_"," ",$user->interest)) }}
            @endif
        </div>
    @endif

    <div class="text-gray-500">

        <div class="text-gray-500 flex">
            <p class="font-semibold mr-2">Info: </p>
            @if($user)
                @if($user->headline)
                    {{ $user->headline }}
                @else
                    <div class="text-gray-400 text-sm flex">
                        Add headline
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="text-gray-500 flex items-center overflow-y-auto" style="white-space: nowrap">
        <p class="font-semibold mr-2">Phone: </p>
        @if($user)
            @if($user->phone)
                {{ $user->phone }}
            @else
                <div class="text-gray-400 text-sm flex">
                    Add phone number
                </div>
            @endif
        @endif
    </div>

    <div class="text-gray-500 flex items-center overflow-y-auto" style="white-space: nowrap">
        <p class="font-semibold mr-2">Location: </p>
        @if($user)
            @if($user->city && $user->state)
                {{ $user->city.','.$user->state }}
            @else
                <div class="text-gray-400 text-sm flex">
                    Add your location
                </div>
            @endif
        @endif
    </div>

    <div class="flex text-gray-500">
        <p class="font-semibold mr-2">Country: </p>
        @if($user)
            {{ $user->country }}
        @endif
    </div>

</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
            <div class="flex items-center">
                <x-resume-dashdoard-icon/>
                <div class="ml-4 text-lg text-gray-600 font-semibold">
                    <a href="#">Resume</a>
                </div>
            </div>

            <x-section-border/>

            <div class="ml-12" style="white-space: nowrap">
                <div class="text-sm text-gray-500">
                    @if($user->resumes)
                        <div class="text-center text-gray-400 flex justify-center">
                            <x-icons.empty/>
                            &nbsp;{{ $user->name }} hasn't uploaded a resume yet
                        </div>
                    @else
                        @foreach($user->resume as $resume)
                            <div
                                    class="text-center font-mono font-semibold text-center py-2"
                                    style="overflow: auto;">
                                <a href="{{ url($resume->resumeLink) }}"
                                   class="text-indigo-500"
                                   target="_blank">View</a> or
                                <x-secondary-button
                                        wire:click="download({{ $resume->id }}, 'resume.pdf')"
                                        class="mr-2"
                                        title="Download resume">
                                    Download
                                </x-secondary-button>
                                {{ $user->name."'s" }} resume
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://laracasts.com">Laracasts</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
        </p>

        <p class="mt-4 text-sm">
            <a href="https://laracasts.com" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Start watching Laracasts

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://tailwindcss.com/">Tailwind</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                Authentication
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started with what matters most: building your application.
        </p>
    </div>
</div>
