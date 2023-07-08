<div>
	@if($projects->isNotEmpty())
		<div class="flex justify-end mr-3 py-6" title="Add another timeline">
			<x-button wire:click="addProject" class=" dark:hover:text-gray-100">
				Add Project
			</x-button>
		</div>
	@endif
	<x-form-section submit="save">
		<x-slot name="title">
			Projects
		</x-slot>
		<x-slot name="description">
			Demonstrate any projects that you have either created or contributed to in their development.
		</x-slot>
		<x-slot name="form">
			@forelse($projects as $project)
				<div class="col-span-6">
					<div class="bg-gray-50 p-6 border
						          mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
						<div>
							<h1 class="font-semibold text-xl dark:text-gray-100">Project name</h1>
						</div>
						<div>
							<h2 class="text-gray-600 mb-6">
								@if($project->link)
									<a class="font-semibold text-indigo-700 dark:text-indigo-300" target="_blank"
									   href="{{ url($project->link) }}">
										{{ ucwords($project->name) }}
									</a>
								@else
									{{ ucwords($project->name) }}
								@endif
							</h2>
						</div>

						@if($project->description)
							<div>
								<h1 class="font-semibold text-xl dark:text-gray-100">Description</h1>
							</div>
							<div>
								<h2 class="text-gray-600 dark:text-gray-400 mb-6">{{ $project->description }}</h2>
							</div>
						@endif



						<div class="flex justify-end">

							<x-secondary-button wire:click="edit({{$project->id}})" class="mr-3">Edit
							</x-secondary-button>
							{{--End Edit modal button--}}

							<x-danger-button wire:click.prevent="deleteId({{ $project->id }})">
								<x-icons.delete-skill/>
							</x-danger-button>
						</div>
					</div>
				</div>
			@empty
				<x-projects-form/>
			@endforelse
		</x-slot>
		@if($projects->isEmpty())
			<x-slot name="actions">
				<x-button>Save</x-button>
			</x-slot>
		@endif
	</x-form-section>
        {{--Edit modal--}}
        <x-dialog-modal wire:model.defer="showProjectModal">
            <x-slot name="title">
                Edit your Project details
            </x-slot>
            <x-slot name="content">
                <x-projects-form/>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showProjectModal', false)"
                                    class="mr-2">
                    Cancel
                </x-secondary-button>
                <x-button wire:click="save">Save</x-button>
            </x-slot>
        </x-dialog-modal>
        {{--End Edit modal--}}

        {{--Show delete modal--}}
        <x-confirmation-modal wire:model.defer="showConfirmDeleteProject">
            <x-slot name="title">
                Confirm Delete
            </x-slot>
            <x-slot name="content">
                <p>Are you sure you want to delete this project details?</p>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showConfirmDeleteProject', false)"
                                    class="mr-2">
                    Cancel
                </x-secondary-button>
                <x-danger-button wire:click.prevent="delete()">Delete
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
        {{--End show delete modal--}}
</div>
