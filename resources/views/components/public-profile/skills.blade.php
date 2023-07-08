@if($user->skill->isNotEmpty())
    <section id="skills" class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12 justify-center">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Skills
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            @if ($user->skill->filter(function ($skill) {
                return $skill->category === 'frontend';
            })->isNotEmpty())
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink max-w-md">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <a href="#" class="flex flex-wrap no-underline hover:no-underline p-4">
                            <p class="text-gray-800 w-full">
                                FRONTEND
                            </p>
                            <div class="text-gray-800 w-full px-6 font-bold">
                                @foreach($user->skill as $skill)
                                    @if($skill->category == 'frontend')
                                        <div>
                                            {{ str_replace('_', ' ', ucwords($skill->name)) }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </a>
                    </div>
                </div>
            @endif

            @if ($user->skill->filter(function ($skill) {
                return $skill->category === 'backend';
            })->isNotEmpty())
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink  max-w-md">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <a href="#" class="flex flex-wrap no-underline hover:no-underline p-4">
                            <p class="text-gray-800 w-full">
                                BACKEND
                            </p>
                            <div class="text-gray-800 w-full px-6 font-bold">
                                @foreach($user->skill as $skill)
                                    @if($skill->category == 'backend')
                                        <div>
                                            {{ str_replace('_', ' ', ucwords($skill->name)) }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if ($user->skill->filter(function ($skill) {
               return $skill->category === 'other';
           })->isNotEmpty())
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink  max-w-md">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <a href="#" class="flex flex-wrap no-underline hover:no-underline p-4">
                            <p class="text-gray-800 w-full">
                                OTHER
                            </p>
                            <div class="text-gray-800 w-full px-6 font-bold">
                                @foreach($user->skill as $skill)
                                    @if($skill->category == 'other')
                                        <div>
                                            {{ str_replace('_', ' ', ucwords($skill->name)) }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endif