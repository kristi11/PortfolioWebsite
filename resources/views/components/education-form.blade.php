<div class="col-span-6">
    <div class="flex col-span-6 sm:col-span-4">
        <div class="w-1/2 mr-3">
            <x-label for="school" value="{{ __('School') }}" class="pt-6"/>
            <x-input wire:model="education.school" id="school" type="text" class="mt-1 block w-full"
                     placeholder="Ex: NYU"
            />
            <x-input-error for="education.school" class="mt-2"/>
        </div>
        <div class="w-1/2">
            <x-label for="country" value="{{ __('Located in') }}" class="pt-6"/>
            <select wire:model="education.country"
                    id="country"
                    type="text"
                    class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="" selected>Select country</option>
                @foreach(\App\Models\Functions::COUNTRIES as $name => $code)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
            <x-input-error for="education.country" class="mt-2"/>
        </div>
    </div>

    <div class="col-span-6 sm:col-span-4">
        <x-label for="link" value="{{ __('School website link') }}" class="pt-6"/>
        <x-input wire:model="education.link" id="link" type="text" class="mt-1 block w-full"
                 placeholder="Website link of your school"
        />
        <x-input-error for="education.link" class="mt-2"/>
    </div>

    <x-label for="degree" value="{{ __('Select degree') }}" class="pt-6"/>
    <p class="text-gray-400 text-xs">Enter the highest education obtained</p>
    <select wire:model="education.degree"
            id="degree"
            type="text"
            class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        <option value="" selected>Select degree</option>
        @foreach(\App\Models\Functions::DEGREES as $name)
            <option value="{{ $name }}">{{ $name }}</option>
        @endforeach
    </select>
    <x-input-error for="education.degree" class="mt-2"/>
    <div class="col-span-6 sm:col-span-4">
        <x-label for="field" value="{{ __('Field of study') }}" class="pt-6"/>
        <x-input wire:model="education.field" id="field" type="text" class="mt-1 block w-full"
                 placeholder="Ex: Computer sciences"
        />
        <x-input-error for="education.field" class="mt-2"/>
    </div>
    {{--        Education start--}}
    <div class="flex col-span-6 sm:col-span-4">
        <div class="w-1/2 mr-3">
            <x-label for="month_started" value="{{ __('Month started') }}" class="pt-6"/>
            <select wire:model="education.month_started"
                    id="month_started"
                    type="text"
                    class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="" selected>Select month</option>
                @foreach(\App\Models\Functions::getMonths() as $number => $name)
                    <option value="{{ $number }}">{{ $name }}</option>
                @endforeach
            </select>
            <x-input-error for="education.month_started" class="mt-2"/>
        </div>
        <div class="w-1/2">
            <x-label for="year_started" value="{{ __('Year started') }}" class="pt-6"/>
            <select wire:model="education.year_started"
                    id="year_started"
                    type="text"
                    class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="" selected>Select year</option>
                @foreach(\App\Models\Functions::getYears() as $years)
                    <option value="{{$years}}">{{$years}}</option>
                @endforeach
            </select>
            <x-input-error for="education.year_started" class="mt-2"/>
        </div>
    </div>
    {{--        End education start--}}
    {{--        Education end--}}
    <div class="flex col-span-6 sm:col-span-4">
        <div class="w-1/2 mr-3">
            <x-label for="month_ended" value="{{ __('Month ended') }}" class="pt-6"/>
            <p class="text-gray-500 text-xs">{{ __('If you are still in school, you do not need to select this.') }}</p>
            <select wire:model="education.month_ended"
                    id="month_ended"
                    type="text"
                    class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="" selected>Select month</option>
                @foreach(\App\Models\Functions::getMonths() as $number => $name)
                    <option value="{{ $number }}">{{ $name }}</option>
                @endforeach
            </select>
            <x-input-error for="education.month_ended" class="mt-2"/>
        </div>
        <div class="w-1/2">
            <x-label for="year_ended" value="{{ __('Year ended') }}" class="pt-6"/>
            <p class="text-gray-500 text-xs">{{ __('If you are still in school, you do not need to select this.') }}</p>
            <select wire:model="education.year_ended"
                    id="year_ended"
                    type="text"
                    class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="" selected>Select year</option>
                @foreach(\App\Models\Functions::getYears() as $years)
                    <option value="{{$years}}">{{$years}}</option>
                @endforeach
            </select>
            <x-input-error for="education.year_ended" class="mt-2"/>
        </div>
    </div>
    {{--        End education end--}}
</div>
