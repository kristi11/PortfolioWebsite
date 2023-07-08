<form wire:submit.prevent="save">
	<x-dialog-modal wire:model.defer="showEditModal">
		<x-slot name="title">Skill details</x-slot>

		<x-slot name="content">
			<div class="col-span-6 sm:col-span-4">
				<x-label for="name" value="{{ __('Skill name') }}"/>
				<label for="name"></label>
				<select wire:model="editing.name"
				        id="name"
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
					<optgroup label="Google">
						@foreach(\App\Models\Functions::GOOGLE as $value => $label)
							<option value="{{ $value }}">{{ $label }}</option>
						@endforeach
					</optgroup>
					<optgroup label="AWS">
						@foreach(\App\Models\Functions::AWS as $value => $label)
							<option value="{{ $value }}">{{ $label }}</option>
						@endforeach
					</optgroup>
					<optgroup label="Other">
						@foreach(\App\Models\Functions::OTHER as $value => $label)
							<option value="{{ $value }}">{{ $label }}</option>
						@endforeach
					</optgroup>

				</select>
				<x-input-error for="editing.name" class="mt-2"/>
				<x-label for="years" value="{{ __('Years of experience') }}" class="mt-4"/>
				<x-input wire:model="editing.years" id="years" type="number"
				             min="{{\App\Models\Functions::MIN_YEARS_OF_EXPERIENCE}}"
				             max="{{\App\Models\Functions::MAX_YEARS_OF_EXPERIENCE}}"
				             class="mt-1 block w-full"
				             placeholder="Years of experience"/>
				<x-input-error for="editing.years" class="mt-2"/>
			</div>
			<x-label for="category" value="{{ __('Skill category') }}" class="mt-4"/>
			<select wire:model="editing.category"
			        id="category"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Choose skill category</option>
					@foreach(\App\Models\Functions::CATEGORY as $value => $label)
						<option value="{{ $value }}">{{ $label }}</option>
					@endforeach
			</select>
			<x-input-error for="editing.category" class="mt-2"/>
		</x-slot>

		<x-slot name="footer">
			<x-secondary-button wire:click="$set('showEditModal', false)" class="mr-2"> Cancel
			</x-secondary-button>
			<x-button type="submit"> Save</x-button>
		</x-slot>
	</x-dialog-modal>
</form>
