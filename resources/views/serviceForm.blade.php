<div class="col-span-6">
	<div class="col-span-6 sm:col-span-4">
		<x-label for="name" value="{{ __('Field of study') }}" class="pt-6"/>
		<x-input wire:model="service.name" id="name" type="text" class="mt-1 block w-full"
		         placeholder="Ex: Website development"
		/>
		<x-input-error for="service.name" class="mt-2"/>
	</div>
	{{--Service description--}}
	<div class="col-span-6 sm:col-span-4">
		<x-label for="description" value="{{ __('Description') }}" class="pt-6 pb-1"/>
		<p class="text-gray-500 text-xs">{{ __('Max 1000 characters.') }}</p>
		<textarea wire:model="service.description" name="description" id="description"
		          cols="30" rows="10"
		          class="border w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
		          placeholder="Write a small description of what you provide with this service..."></textarea>
		<x-input-error for="service.description" class="mt-2"/>
	</div>
</div>
