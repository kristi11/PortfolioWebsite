<div>
	<x-form-section submit="save">
		<x-slot name="title">
			Resume
		</x-slot>

		<x-slot name="description">
			The resume section provides a comprehensive summary of
			your professional background, experience, and accomplishments in the field.
		</x-slot>

		<x-slot name="form">
			@forelse($resumes as $resume)
				<div class="col-span-6 flex font-mono font-semibold items-center justify-center">
					<x-icons.resume-svg/>
					<x-secondary-button wire:click="download({{ $resume->id }}, 'resume.pdf')" class="mr-2"
					                        title="Download resume">
						<x-icons.download/>
					</x-secondary-button>
					<x-danger-button wire:click="deleteId({{ $resume->id }})" title="Delete resume">
						<x-icons.delete-skill/>
					</x-danger-button>
				</div>
			@empty
				<div class="block col-span-6 items-center mx-auto text-center"
				     x-data="{ isUploading: false, progress: 0, uploadMessage: '' }"
				     x-on:livewire-upload-start="isUploading = true"
				     x-on:livewire-upload-finish="isUploading = false; uploadMessage = 'Upload ready.'"
				     x-on:livewire-upload-error="isUploading = false"
				     x-on:livewire-upload-progress="progress = $event.detail.progress">
					<!-- Label that acts as a button -->
					<label for="resume"
					       class="border border-indigo-500 cursor-pointer flex font-semibold inline-block px-4 py-2 rounded text-gray-500">
						<svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="upload"
						     data-name="Line Color" xmlns="http://www.w3.org/2000/svg" class="icon line-color mr-2">
							<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
							<g id="SVGRepo_iconCarrier">
								<line id="secondary" x1="12" y1="16" x2="12" y2="3"
								      style="fill: none; stroke: #2ca9bc; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></line>
								<polyline id="secondary-2" data-name="secondary" points="16 7 12 3 8 7"
								          style="fill: none; stroke: #2ca9bc; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
								<path id="primary" d="M20,16v4a1.08,1.08,0,0,1-1.14,1H5.14A1.08,1.08,0,0,1,4,20V16"
								      style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
							</g>
						</svg>
						Upload resume
					</label>
					<!-- File Input -->
					<input type="file" wire:model="resume" id="resume" class="hidden">

					<!-- Progress Bar -->
					<div x-show="isUploading" class="mt-3 mx-auto">
						<progress max="100" x-bind:value="progress"></progress>
					</div>

					<!-- Upload Message -->
					<div x-text="uploadMessage" x-show="uploadMessage !== ''" class="mt-3 mx-auto text-green-500"></div>
					<x-input-error for="resume" class="mt-2 col-span-6 mx-auto"/>
				</div>

			@endforelse
		</x-slot>
		@if($resumes->isEmpty())
			<x-slot name="actions">
				<x-button>Save</x-button>
			</x-slot>
		@endif

	</x-form-section>
	<form wire:submit.prevent="delete()">
		<x-confirmation-modal wire:model="showConfirmDeleteResume">
			<x-slot name="title">
				Confirm Delete
			</x-slot>
			<x-slot name="content">
				<p>Are you sure you want to delete your resume?</p>
			</x-slot>
			<x-slot name="footer">
				<x-secondary-button wire:click="$set('showConfirmDeleteResume', false)" class="mr-2">Cancel
				</x-secondary-button>
				<x-danger-button type="submit">Delete
				</x-danger-button>
			</x-slot>
		</x-confirmation-modal>
	</form>
</div>
