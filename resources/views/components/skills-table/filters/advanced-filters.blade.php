<div class="bg-gray-200 flex mb-4 p-6 rounded shadow  dark:bg-gray-800">
	<div class="w-1/2">
		<x-label for="skillName" value="{{ __('Skill name') }}"/>
		<select wire:model.lazy="advancedFilters.skillName"
		        id="advancedFilters-skill"
		        type="text"
		        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
			<option value="" selected>Choose a skill</option>
			<optgroup label="Languages">
				@foreach(\App\Models\Functions::LANGUAGES as $value => $label)
					<option value="{{ $value }}">{{ $label }}</option>
				@endforeach
			</optgroup>
			<optgroup label="Front-end frameworks">
				@foreach(\App\Models\Functions::FRONTEND_FRAMEWORKS as $value => $label)
					<option value="{{ $value }}">{{ $label }}</option>
				@endforeach
			</optgroup>
			<optgroup label="Back-end frameworks">
				@foreach(\App\Models\Functions::BACKEND_FRAMEWORKS as $value => $label)
					<option value="{{ $value }}">{{ $label }}</option>
				@endforeach
			</optgroup>
		</select>
		<x-label for="years" value="{{ __('Years of experience') }}" class="mt-4"/>
		<x-input wire:model.lazy="advancedFilters.years" id="advancedFilters-years" type="number"
		             min="{{\App\Models\Functions::MIN_YEARS_OF_EXPERIENCE}}"
		             max="{{\App\Models\Functions::MAX_YEARS_OF_EXPERIENCE}}"
		             class="mt-1 block w-full"
		             placeholder="Search based on experience"/>
	</div>

	<div class="w-1/2 ml-2">
		<x-label for="years" value="{{ __('Minimum date when skill was created') }}"/>
		<x-input wire:model="advancedFilters.date-min" id="advancedFilters-date-min" type="date"
		             class="mt-1 block w-full"
		             placeholder="MM/DD/YYYY"/>
		<x-label for="years" value="{{ __('Maximum date when skill was created') }}" class="mt-4"/>
		<x-input wire:model="advancedFilters.date-max" id="advancedFilters-date-max" type="date"
		             class="mt-1 block w-full"
		             placeholder="MM/DD/YYYY"/>
		<a wire:click="resetFilters" href="#"
		   class="hidden mt-5 sm:block text-indigo-700 text-right text-xs" style="white-space: nowrap">
			Reset Filters
		</a>
	</div>
</div>
