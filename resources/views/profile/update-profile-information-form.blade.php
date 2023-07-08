<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 dark:text-white">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

{{--        Job interest--}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="interest" value="{{ __('Interested in:') }}"/>
                <select wire:model="state.interest"
                        id="interest"
                        name="interest"
                        type="text"
                        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm
                        ">
                    class=""
                    <option value="" class="text-gray-500" selected>Job types</option>
                    @foreach(\App\Models\Functions::JOBS as $value => $name)
                        <option value="{{ $value }}">{{ $name }}</option>
                    @endforeach

                </select>
                <x-input-error for="interest" class="mt-2"/>
            </div>

        <!-- Headline -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="headline" value="{{ __('Headline (max 1000 characters)') }}"/>
            <textarea wire:model.defer="state.headline"
                      name="headline"
                      id="headline"
                      placeholder="Create a descriptive headline that offers prospective employers a concise overview of your professional identity."
                      maxlength="1000"
                      class="border w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                      rows="10">
                        </textarea>
            <x-input-error for="headline" class="mt-2"/>
        </div>

        <!-- Phone nr -->

        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('Phone number') }}"/>
            <p class="text-gray-500 text-xs">Please enter the phone number in the following format 'xxx-xxx-xxxx' where
                'x' represents the numbers</p>
            <x-input id="phone" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone"
                         placeholder="xxx-xxx-xxxx"/>
            <x-input-error for="phone" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('City') }}"/>
            <x-input
                    id="city"
                    name="city"
                    type="text"
                    wire:model.defer="state.city"
                    placeholder="Enter city"
                    class="mt-1 block w-full"
            />
            <x-input-error for="city" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="state" value="{{ __('State') }}"/>
            <select wire:model="state.state"
                    id="state"
                    type="text"
                    class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm
                               ">
                <option value="" class="text-gray-500" selected>Select state</option>
                <optgroup label="North America">
                    @foreach(\App\Models\Functions::NORTH_AMERICAN_STATES as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="South America">
                    @foreach(\App\Models\Functions::SOUTH_AMERICAN_STATES as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Europe">
                    @foreach(\App\Models\Functions::EUROPEAN_STATES as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Asia">
                    @foreach(\App\Models\Functions::ASIAN_STATES as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Africa">
                    @foreach(\App\Models\Functions::AFRICAN_STATES as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Australia">
                    @foreach(\App\Models\Functions::AUSTRALIAN_STATES as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </optgroup>

            </select>
            <x-input-error for="state" class="mt-2"/>
        </div>

{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="country" value="{{ __('Country') }}"/>--}}
{{--            <select wire:model="state.country"--}}
{{--                    id="country"--}}
{{--                    type="text"--}}
{{--                    class="mt-1 block w-full border-gray-300--}}
{{--                             focus:border-indigo-300 focus:ring--}}
{{--                              focus:ring-indigo-200 focus:ring-opacity-50--}}
{{--                               rounded-md shadow-sm">--}}
{{--                <option value="" class="text-gray-500" selected>Select country</option>--}}
{{--                    @foreach(\App\Models\Functions::COUNTRIES as $name => $code)--}}
{{--                    <option value="{{ $name }}">{{ $name }}</option>--}}
{{--                    @endforeach--}}
{{--            </select>--}}
{{--            <x-input-error for="country" class="mt-2"/>--}}
{{--        </div>--}}

{{--        Linkedin--}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="linkedin_link" value="{{ __('Linkedin link') }}"/>
            <x-input id="linkedin_link"
                         type="text"
                         class="mt-1 block w-full"
                         wire:model.defer="state.linkedin_link"
                         placeholder="Add your Linkedin account link"
            />
            <x-input-error for="linkedin_link" class="mt-2"/>
        </div>

{{--        Github--}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="github_link" value="{{ __('Github link') }}"/>
            <x-input id="github_link"
                         type="text"
                         class="mt-1 block w-full"
                         wire:model.defer="state.github_link"
                         placeholder="Add your Github account link"
            />
            <x-input-error for="github_link" class="mt-2"/>
        </div>

        {{--        StackOverflow--}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="stackoverflow_link" value="{{ __('Stack Overflow link') }}"/>
            <x-input id="stackoverflow_link"
                     type="text"
                     class="mt-1 block w-full"
                     wire:model.defer="state.stackoverflow_link"
                     placeholder="Add your Stack Overflow account link"
            />
            <x-input-error for="stackoverflow_link" class="mt-2"/>
        </div>

        {{--        Medium--}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="medium_link" value="{{ __('Medium link') }}"/>
            <x-input id="medium_link"
                     type="text"
                     class="mt-1 block w-full"
                     wire:model.defer="state.medium_link"
                     placeholder="Add your Medium account link"
            />
            <x-input-error for="medium_link" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
