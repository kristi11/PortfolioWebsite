<div class="flex items-center ml-12">
	<div class="">
		<x-danger-button wire:click="$toggle('showDeleteModal')" type="button"
		                     style="white-space: nowrap;"
		                     :disabled="$this->noneSelected()">
			<x-icons.delete-skill/>
		</x-danger-button>
	</div>
	<div class="ml-2">
		<x-button wire:click="create" style="white-space: nowrap;" class="focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
			<x-icons.add-skill/>
		</x-button>
	</div>
</div>
