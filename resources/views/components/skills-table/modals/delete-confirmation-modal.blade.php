<form wire:submit.prevent="deleteSelected">
	<x-confirmation-modal wire:model="showDeleteModal">
		<x-slot name="title">
			Confirm Delete
		</x-slot>
		<x-slot name="content">
			<p>Are you sure you want to delete? This action is irreversible.</p>
		</x-slot>
		<x-slot name="footer">
			<x-secondary-button wire:click="$set('showDeleteModal', false)" class="mr-2">Cancel
			</x-secondary-button>
			<x-danger-button type="submit">Delete
			</x-danger-button>
		</x-slot>
	</x-confirmation-modal>
</form>
