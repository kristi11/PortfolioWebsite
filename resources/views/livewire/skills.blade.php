<div>
	<div class="py-4 space-y-4">

		<div class="flex justify-between overflow-y-auto p-2">
			{{-- Click to open advanced search --}}
			<div class="flex items-center mr-3">
				<x-input class="py-1 px-4" wire:model="advancedFilters.search"
				             placeholder="Search for a skill"/>
				<a wire:click="$toggle('showFilters')" href="#" class="hidden ml-4 sm:block text-indigo-700"
				   style="white-space: nowrap;">
					@if($showFilters)
						Hide
					@endif
					Advanced search...
				</a>
			</div>
			{{-- End click to open advanced search --}}

			{{-- Action buttons Delete/New skill --}}
			<x-skills-table.action-buttons/>
			{{-- End action buttons Delete/New skill --}}
		</div>
	</div>

	{{--Advanced filters--}}
	<div>
		@if($showFilters)
			<x-skills-table.filters.advanced-filters/>
		@endif
	</div>
	{{--End advanced filters--}}

	<div class="bg-white overflow-y-auto shadow-xl sm:rounded-lg">
		{{--Skills table--}}
		<x-table.table>
			<x-slot name="head">
				<x-table.table-heading class="px-6 py-6">
					<x-checkbox wire:model="selectPage"/>
				</x-table.table-heading>
				<x-table.table-heading sortable wire:click="sortBy('name')"
				                       :direction="$sortField === 'name' ? $sortDirection : null"
				                       style="white-space: nowrap;"
				                       class="px-6 py-6">
					Skills
				</x-table.table-heading>
				<x-table.table-heading sortable wire:click="sortBy('years')"
				                       :direction="$sortField === 'years' ? $sortDirection : null"
				                       style="white-space: nowrap;"
				                       class="px-6 py-6">
					Years of experience
				</x-table.table-heading>
				<x-table.table-heading sortable wire:click="sortBy('created_at')"
				                       :direction="$sortField === 'created_at' ? $sortDirection : null"
				                       style="white-space: nowrap;"
				                       class="px-6 py-6">
					Date created
				</x-table.table-heading>
				<x-table.table-heading style="white-space: nowrap;"
				                       class="px-6 py-6">
					<div style="white-space: nowrap;"> Edit skill</div>
				</x-table.table-heading>
			</x-slot>
			<x-slot name="body">
				{{--Banner that asks you if you want to select everything--}}
				@if($selectPage)
					<tr>
						<td colspan="5" class="bg-gray-500 p-6 text-white">
							@unless($selectAll)
								<div>
                                <span>You've selected <strong>{{ $skills->count() }}</strong> skills. Do you want to select all
                                <strong>{{ $skills->total() }}</strong> ?</span>
									<x-secondary-button class="ml-4" wire:click="selectAll">Select all
									</x-secondary-button>
								</div>
							@else
								<span>You've currently selected all <strong>{{ $skills->total() }}</strong> skills.</span>
							@endif
						</td>
					</tr>
				@endif
				{{--End Banner that asks you if you want to select everything--}}

				@forelse ($skills as $skill)
					<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
					    wire:loading.class.delay="opacity-50" wire:key="row-{{ $skill->id }}">
						<td class="px-6 py-4 text-gray-900 dark:text-white">
							<x-checkbox wire:model="selected" value="{{$skill->id}}"/>

						</td>
						<td class="py-4 text-gray-900 dark:text-white w-full">
							{{ str_replace('_', ' ', strtoupper($skill->name)) }}
						</td>
						<td class="px-6 py-4 text-gray-900 dark:text-white">
							@if($skill->years == 1)
								{{ $skill->years.' year' }}
							@else
								{{ $skill->years.' years' }}
							@endif
						</td>
						<td class="px-6 py-4 text-gray-900 dark:text-white">
							{{ \Carbon\Carbon::parse($skill->created_at)->diffForHumans() }}
						</td>
						<td class="px-6 py-4 text-gray-900 dark:text-white">
							<x-secondary-button wire:click="edit({{$skill->id}})">Edit</x-secondary-button>
						</td>
					</tr>
				@empty
					{{--Message to be displayed if there are no skills--}}
					<x-skills-table.no-skills-found/>
					{{--End message to be displayed if there are no skills--}}
				@endforelse
			</x-slot>
		</x-table.table>
		{{--End skills table--}}

		{{--Delete confirmation modal--}}
		<x-skills-table.modals.delete-confirmation-modal/>
		{{--End delete confirmation modal--}}

		{{--Edit/Create modal--}}
		<x-skillsTable.modals.create-edit-modal/>
		{{--End edit/create modal--}}
	</div>
	{{--Paginate links--}}
	<div class="p-2">
		{{ $skills->links() }}
	</div>
	{{--End paginate links--}}
	<x-section-border/>
</div>

