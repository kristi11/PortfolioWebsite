<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <div class="flex justify-end">
        <a href="{{ route('profile.show') }}"
           class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
            Edit Profile
        </a>
    </div>
    <div>
        <img class="h-20 w-20 rounded-full object-cover"
             src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"/>
    </div>

    <div class="mt-8 text-2xl dark:text-white">
        {{ ucwords($user->name) }}
    </div>

    <div class="flex overflow-y-auto items-center">
        <div class="text-gray-500">
            @if($user->stackoverflow_link)
                <a href="{{ Auth::user()->stackoverflow_link }}" target="_blank"
                   class="font-semibold mr-2">
                    <x-icons.profile-stackoverflow-svg />
                </a>
            @endif
        </div>

        <div class="text-gray-500 mr-2">
            @if($user->github_link)
                <a href="{{ Auth::user()->github_link }}" target="_blank"
                   class="font-semibold mr-2">
                    <x-icons.profile-github-svg/>
                </a>
            @endif
        </div>

        <div class="text-gray-500 mr-2">
            @if($user->linkedin_link)
                <a href="{{ Auth::user()->linkedin_link }}" target="_blank"
                   class="font-semibold mr-2">
                    <x-icons.profile-linkedin-svg/>
                </a>
            @endif
        </div>

        <div class="text-gray-500">
            @if($user->medium_link)
                <a href="{{ Auth::user()->medium_link }}" target="_blank"
                   class="font-semibold mr-2">
                    <x-icons.profile-medium-svg/>
                </a>
            @endif
        </div>
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

    <div class="text-gray-500 flex overflow-y-auto" style="white-space: nowrap">
        <p class="font-semibold mr-2">Interested in: </p>
        @if(!$user->interest)
            <div class="text-gray-400 text-sm flex">
                Add a job interest
            </div>
        @else
            {{ ucwords(str_replace("_"," ",$user->interest)) }}
        @endif
    </div>

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
                {{ ucwords($user->city).','.' '.$user->state}}
            @else
                <div class="text-gray-400 text-sm flex">
                    Add your location
                </div>
            @endif
        @endif
    </div>
</div>
