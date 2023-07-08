<div>
	@if($experiences->isNotEmpty())
		<div class="flex justify-end mr-3 py-6" title="Add another timeline">
			<x-button wire:click="addExperience" class="dark:hover:text-gray-100">
				Add Experience
			</x-button>
		</div>
	@endif
	<x-form-section submit="save">
		<x-slot name="title">
			Work experience
		</x-slot>
		<x-slot name="description">
			The work experience section typically provides a
			comprehensive overview of your professional background, highlighting your key
			achievements, and contributions to various projects.
		</x-slot>
		<x-slot name="form">
			@forelse($experiences as $experience)
				<div class="col-span-6">
					<div class="bg-gray-50 p-6 border
						          mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
						<div>
							<h1 class="font-semibold text-xl dark:text-gray-100">Position</h1>
						</div>
						<div class="mb-6">
								<h2 class="text-gray-600 dark:text-gray-400">{{ $experience->position }}</h2>
						</div>

						<div>
							<h1 class="font-semibold text-xl dark:text-gray-100">Location</h1>
						</div>
						<div class="mb-6">
							<h2 class="text-gray-600 dark:text-gray-400">{{ $experience->location }}</h2>
						</div>

						<div>
							<h1 class="font-semibold text-xl dark:text-gray-100">Employment type</h1>
						</div>
						<div class="mb-6">
							<h2 class="text-gray-600 dark:text-gray-400">{{ ucwords($experience->type) }}</h2>
						</div>

						<div>
							<h1 class="font-semibold text-xl dark:text-gray-100">Company</h1>
						</div>
						<div>
							<h2 class="text-gray-600 mb-6 dark:text-gray-400">
								@if($experience->link)
									<a class="font-semibold text-indigo-700 dark:text-indigo-300" target="_blank"
									   href="{{ url($experience->link) }}">
										{{ ucwords($experience->company) }}
									</a>
								@else
									{{ ucwords($experience->company) }}
								@endif
							</h2>
						</div>

						@if($experience->description)
							<div>
								<h1 class="font-semibold text-xl dark:text-gray-100">Description</h1>
							</div>
							<div>
								<h2 class="text-gray-600 mb-6 dark:text-gray-400">{{ $experience->description }}</h2>
							</div>
						@endif


						<div>
							<h1 class="font-semibold text-xl dark:text-gray-100">Years of experience</h1>
						</div>
						<div class="mb-6">
							<h2 class="text-gray-600 dark:text-gray-400">
								@if($experience->month_end && $experience->year_end)
									Between {{ Carbon\Carbon::createFromFormat('m', $experience->month_start)->format('F') }}
									{{ $experience->year_start }}
									and {{ Carbon\Carbon::createFromFormat('m', $experience->month_end)->format('F') }}
									{{ $experience->year_end }}
								@else
									Started
									in {{ Carbon\Carbon::createFromFormat('m', $experience->month_start)->format('F') }}
									{{ $experience->year_start }} and currently working here.
								@endif
							</h2>
						</div>
						<div class="flex justify-end">

							{{--Show Edit modal button--}}
							<x-secondary-button wire:click="edit({{$experience->id}})" class="mr-3">Edit
							</x-secondary-button>
							{{--End Edit modal button--}}

                            {{--Show delete modal button--}}
							<x-danger-button wire:click.prevent="deleteId({{ $experience->id }})">
								<x-icons.delete-skill/>
							</x-danger-button>
                            {{--End delete modal button--}}
						</div>
					</div>
				</div>
			@empty
				<x-work-experience-form/>
			@endforelse
		</x-slot>
		@if($experiences->isEmpty())
			<x-slot name="actions">
				<x-button>Save</x-button>
			</x-slot>
		@endif
	</x-form-section>
        {{--Edit modal--}}
        <x-dialog-modal wire:model.defer="showExperienceModal">
            <x-slot name="title">
                Edit your Experience details
            </x-slot>
            <x-slot name="content">
                <x-work-experience-form/>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showExperienceModal', false)"
                                    class="mr-2">
                    Cancel
                </x-secondary-button>
                <x-button wire:click="save">Save</x-button>
            </x-slot>
        </x-dialog-modal>
        {{--End Edit modal--}}
        {{--Show delete modal--}}
        <x-confirmation-modal wire:model.defer="showConfirmDeleteExperience">
            <x-slot name="title">
                Confirm Delete
            </x-slot>
            <x-slot name="content">
                <p>Are you sure you want to delete this work experience details?</p>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showConfirmDeleteExperience', false)"
                                    class="mr-2">
                    Cancel
                </x-secondary-button>
                <x-danger-button wire:click.prevent="delete()">Delete
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
        {{--End show delete modal--}}
</div>
