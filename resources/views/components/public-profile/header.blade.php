<!--Nav-->
<nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
            <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                {{ env('APP_NAME') }}
            </a>
        </div>
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20 mx-10" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                @if($user->whyMe)
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#whyMe">Why me</a>
                    </li>
                @endif
{{--                @if($user->github_link || $user->linkedin_link || $user->stackoverflow_link)--}}
{{--                        <li class="mr-3">--}}
{{--                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#socials">Socials</a>--}}
{{--                        </li>--}}
{{--                @endif--}}
{{--                    @if($user->services->count() > 0)--}}
{{--                        <li class="mr-3">--}}
{{--                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#services">Services</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                    @if($user->skill->count() > 0)
                        <li class="mr-3">
                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#skills">Skills</a>
                        </li>
                    @endif
                    @if($user->experience->count() > 0)
                        <li class="mr-3">
                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#experience">Experience</a>
                        </li>
                    @endif
                    @if($user->project->count() > 0)
                        <li class="mr-3">
                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#project">Projects</a>
                        </li>
                    @endif
                    @if($user->certificate->count() > 0)
                        <li class="mr-3">
                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#certificate">Certificates</a>
                        </li>
                    @endif
{{--                    @if($user->education->count() > 0)--}}
{{--                        <li class="mr-3">--}}
{{--                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#education">Education</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
            </ul>
            @if($user->resume->count() > 0)
                <button
                        id="navAction"
                        class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                >
                    @foreach($user->resume as $resume)
                        <a href="{{ url($resume->resumeLink) }}"
                           target="_blank">View Resume</a>
                    @endforeach
                </button>
            @endif
        </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>
<!--Hero-->
<div class="pt-24">
    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">
                @if($user && $user->interest)
                    {{ ucwords(str_replace("_"," ",ucwords($user->interest))) }}
                @endif
            </p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
                @if($user && $user->name)
                    Hi, i'm {{ucwords($user->name)}}
                @endif
            </h1>
            <p class="leading-normal text-2xl mb-8">
                @if($user && $user->headline)
                    {{$user->headline}}
                @endif
            </p>

{{--            <h3>--}}
{{--                @if($user && $user->email)--}}
{{--                    <a href="mailto:{{$user->email}}" target="_blank" class="text-blue-100 hover:text-blue-300 text-left sm:text-center">{{$user->email}}</a>--}}
{{--                    <livewire:secure-mailto email="{{$user->email}}" />--}}
{{--                @endif--}}
{{--            </h3>--}}

            <p class="leading-normal text-2xl">
                @if($user && $user->phone)
                    {{$user->phone}}
                @endif
            </p>

            <h3 class="leading-normal text-2xl">
                @if($user && $user->city && $user->state)
                    {{ ucwords($user->city).','.$user->state }}
                @endif
            </h3>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 py-6 text-center">
            <img alt="{{$user->name}}'s profile picture" class="border-2 md:w-1/2 mx-auto p-3 rounded-full shadow-2xl w-full z-50" src="{{$user->profile_photo_url}}" />
        </div>
    </div>
</div>
<div class="relative -mt-12 lg:-mt-24">
    <x-public-profile.header-s-v-g/>
</div>
