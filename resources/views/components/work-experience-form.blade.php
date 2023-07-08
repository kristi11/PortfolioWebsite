<div class="col-span-6">
	<div class="col-span-6 sm:col-span-4">
		<x-label for="position" value="{{ __('Position') }}" class="pt-6"/>
		<x-input wire:model="experience.position" id="position" type="text" class="mt-1 block w-full"
		             placeholder="Ex: Full stack developer"
		/>
		<x-input-error for="experience.position" class="mt-2"/>
	</div>
	<div class="flex col-span-6 sm:col-span-4">
		<div class="w-1/2 mr-3">
			<x-label for="company" value="{{ __('Company') }}" class="pt-6"/>
			<x-input wire:model="experience.company" id="company" type="text" class="mt-1 block w-full"
			             placeholder="Ex: Google"
			/>
			<x-input-error for="experience.company" class="mt-2"/>
		</div>
		<div class="w-1/2">
			<x-label for="location" value="{{ __('Located in') }}" class="pt-6"/>
			<select wire:model="experience.location"
			        id="location"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select country</option>
				@foreach(\App\Models\Functions::COUNTRIES as $name => $code)
					<option value="{{ $name }}">{{ $name }}</option>
				@endforeach
			</select>
			<x-input-error for="experience.location" class="mt-2"/>
		</div>
	</div>

	<div class="col-span-6 sm:col-span-4">
		<x-label for="link" value="{{ __('Company website') }}" class="pt-6"/>
		<p class="text-gray-500 text-xs">{{ __('Company website is not required, but recommended.') }}</p>
		<x-input wire:model="experience.link" id="link" type="url" class="mt-1 block w-full"
		             placeholder="Website link of the company you worked for..."
		/>
		<x-input-error for="experience.link" class="mt-2"/>
	</div>

	{{--Timeline description--}}
	<div class="col-span-6 sm:col-span-4">
		<x-label for="description" value="{{ __('Responsibilities') }}" class="pt-6 pb-1"/>
		<p class="text-gray-500 text-xs">{{ __('Write something about what you did at this company. Max 1000 characters.') }}</p>
		<textarea wire:model="experience.description" name="description" id="description"
		          cols="30" rows="10"
		          class="border w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
		          placeholder="Write a small description of what you did in this company..."></textarea>
		<x-input-error for="experience.description" class="mt-2"/>
	</div>
	{{--End timeline description--}}

	<x-label for="type" value="{{ __('Employment type') }}" class="pt-6"/>
	<select wire:model="experience.type"
	        id="type"
	        type="text"
	        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
		<option value="" selected>Select employment type</option>
		@foreach(\App\Models\Functions::EMPLOYMENT as $value => $name)
			<option value="{{ $value }}">{{ $name }}</option>
		@endforeach
	</select>
	<x-input-error for="experience.type" class="mt-2"/>
	{{--        ------------------------------------------------------------------------------------------------------------------}}
	{{--        workExperience start--}}
	<div class="flex col-span-6 sm:col-span-4">
		<div class="w-1/2 mr-3">
			<x-label for="month_start" value="{{ __('Month started') }}" class="pt-6"/>
			<select wire:model="experience.month_start"
			        id="month_start"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select month</option>
				@foreach(\App\Models\Functions::getMonths() as $number => $name)
					<option value="{{ $number }}">{{ $name }}</option>
				@endforeach
			</select>
			<x-input-error for="experience.month_start" class="mt-2"/>
		</div>
		<div class="w-1/2">
			<x-label for="year_start" value="{{ __('Year started') }}" class="pt-6"/>
			<select wire:model="experience.year_start"
			        id="year_start"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select year</option>
				@foreach(\App\Models\Functions::getYears() as $years)
					<option value="{{$years}}">{{$years}}</option>
				@endforeach
			</select>
			<x-input-error for="experience.year_start" class="mt-2"/>
		</div>
	</div>
	{{--        End workExperience start--}}
	{{--        -------------------------------------------------------------------------------------------------------}}
	{{--        workExperience end--}}
	<div class="flex col-span-6 sm:col-span-4">
		<div class="w-1/2 mr-3">
			<x-label for="month_end" value="{{ __('Month ended') }}" class="pt-6"/>
			<p class="text-gray-500 text-xs">{{ __('If you are still working here, you do not need to select this.') }}</p>
			<select wire:model="experience.month_end"
			        id="month_end"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select month</option>
				@foreach(\App\Models\Functions::getMonths() as $number => $name)
					<option value="{{ $number }}">{{ $name }}</option>
				@endforeach
			</select>
			<x-input-error for="experience.month_end" class="mt-2"/>
		</div>
		<div class="w-1/2">
			<x-label for="year_end" value="{{ __('Year ended') }}" class="pt-6"/>
			<p class="text-gray-500 text-xs">{{ __('If you are still working here, you do not need to select this.') }}</p>
			<select wire:model="experience.year_end"
			        id="year_end"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select year</option>
				@foreach(\App\Models\Functions::getYears() as $years)
					<option value="{{$years}}">{{$years}}</option>
				@endforeach
			</select>
			<x-input-error for="experience.year_end" class="mt-2"/>
		</div>
	</div>
	{{--        End workExperience end--}}
</div>
