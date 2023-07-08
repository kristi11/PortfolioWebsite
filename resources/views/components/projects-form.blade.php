<div class="col-span-6">
	<div class="col-span-6 sm:col-span-4">
		<x-label for="name" value="{{ __('Project name') }}" class="pt-6"/>
		<x-input wire:model="project.name" id="name" type="text" class="mt-1 block w-full"
		         placeholder="Ex: Laravel blog"
		/>
		<x-input-error for="project.name" class="mt-2"/>
	</div>

	<div class="col-span-6 sm:col-span-4">
		<x-label for="link" value="{{ __('Project link') }}" class="pt-6"/>
		<x-input wire:model="project.link" id="link" type="url" class="mt-1 block w-full"
		         placeholder="Add project link"
		/>
		<x-input-error for="project.link" class="mt-2"/>
	</div>

	{{--Project description--}}
	<div class="col-span-6 sm:col-span-4">
		<x-label for="description" value="{{ __('Description') }}" class="pt-6 pb-1"/>
		<textarea wire:model="project.description" name="description" id="description"
		          cols="30" rows="10"
		          class="border w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
		          placeholder="Write something about this project. Max 1000 characters"></textarea>
		<x-input-error for="project.description" class="mt-2"/>
	</div>
	{{--End description end--}}
</div>
