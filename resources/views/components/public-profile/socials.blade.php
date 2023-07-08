@if($user->github_link || $user->linkedin_link || $user->stackoverflow_link)
    <section id="socials" class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Check me out on
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap justify-center mb-20">
                @if($user->stackoverflow_link)
                    <a href="{{ $user->stackoverflow_link }}" target="_blank"
                       class="font-semibold mr-2">
                        <x-icons.profile-stackoverflow-svg/>
                    </a>
                @endif
                <div class="text-gray-500 mr-2">
                    @if($user->github_link)
                        <a href="{{ $user->github_link }}" target="_blank"
                           class="font-semibold mr-2">
                            <x-icons.profile-github-svg/>
                        </a>
                    @endif
                </div>

                    <div class="text-gray-500 mr-2">
                        @if($user->linkedin_link)
                            <a href="{{ $user->linkedin_link }}" target="_blank"
                               class="font-semibold mr-2">
                                <x-icons.profile-linkedin-svg/>
                            </a>
                        @endif
                    </div>
                    <div class="text-gray-500 mr-2">
                        @if($user->medium_link)
                            <a href="{{ $user->medium_link }}" target="_blank"
                               class="font-semibold mr-2">
                                <x-icons.profile-medium-svg/>
                            </a>
                        @endif
                    </div>
            </div>
        </div>
    </section>
@endif
