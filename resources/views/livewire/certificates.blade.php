<div>
    @if($certificates->isNotEmpty())
        <div class="flex justify-end mr-3 py-6" title="Add another certificate">
            <x-button wire:click="addCertificate" class="dark:hover:text-gray-100">
                Add Certificate
            </x-button>
        </div>
    @endif
    <x-form-section submit="addCertificate">
        <x-slot name="title">
            Certificates
        </x-slot>
        <x-slot name="description">
            A certifications section typically includes a list of the
            professional certifications that you have obtained.
        </x-slot>
        <x-slot name="form">
            @forelse($certificates as $certificate)
                <div class="col-span-6">
                    <div class="bg-gray-50 p-6 border
						          mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <div>
                            <h1 class="font-semibold text-xl dark:text-gray-100">Certificate name</h1>
                        </div>
                        <div class="mb-6">
                            @if($certificate->credentialURL)
                                <a href="{{ url($certificate->credentialURL) }}"
                                   class="font-semibold text-indigo-700 dark:text-indigo-300"
                                   target="_blank">{{ $certificate->name }}</a>
                            @else
                                <h2 class="text-gray-600 dark:text-gray-400">{{ $certificate->name }}</h2>
                            @endif
                        </div>

                        <div>
                            <h1 class="font-semibold text-xl dark:text-gray-100">Organization</h1>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-gray-600 dark:text-gray-400">{{ $certificate->organization }}</h2>
                        </div>

                        @if($certificate->credentialID)
                            <div>
                                <h1 class="font-semibold text-xl dark:text-gray-100">Credential ID</h1>
                            </div>
                            <div class="mb-6">
                                <h2 class="text-gray-600 dark:text-gray-400">{{ $certificate->credentialID }}</h2>
                            </div>
                        @endif

                        <div>
                            <h1 class="font-semibold text-xl dark:text-gray-100">Certificate description</h1>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-gray-600 dark:text-gray-400">{{ $certificate->description }}</h2>
                        </div>

                        <div>
                            <h1 class="font-semibold text-xl dark:text-gray-100">When did you obtain this
                                certificate</h1>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-gray-600 dark:text-gray-400">
                                @if($certificate->month_ended && $certificate->year_ended)
                                    Between {{ Carbon\Carbon::createFromFormat('m', $certificate->month_started)->format('F') }}
                                    {{ $certificate->year_started }}
                                    and {{ Carbon\Carbon::createFromFormat('m', $certificate->month_ended)->format('F') }}
                                    {{ $certificate->year_ended }}.
                                @else
                                    Obtained
                                    in {{ Carbon\Carbon::createFromFormat('m', $certificate->month_started)->format('F') }}
                                    {{ $certificate->year_started }}. This certificate doesn't
                                    expire
                                @endif
                            </h2>
                        </div>

                        {{--Edit button--}}
                        @auth()
                            <div class="flex justify-end">
                                <x-secondary-button wire:click="edit({{ $certificate->id }})" class="mr-2">Edit
                                </x-secondary-button>
                                {{--End edit button--}}
                                {{--Delete button--}}
                                <x-danger-button wire:click.prevent="deleteId({{ $certificate->id }})">
                                    <x-icons.delete-skill/>
                                </x-danger-button>
                                {{--End delete button--}}
                            </div>
                        @endauth
                    </div>

                </div>

            @empty
                <x-certificates-form/>
            @endforelse

        </x-slot>
        @if($certificates->isEmpty())
            <x-slot name="actions">
                <x-button>Save</x-button>
            </x-slot>
        @endif
    </x-form-section>

    {{--Edit modal--}}
    <x-dialog-modal wire:model="showCertificateModal">
        <x-slot name="title">
            Edit certificate details
        </x-slot>

        <x-slot name="content">
            <x-certificates-form/>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-2"
                                wire:click="$set('showCertificateModal', false)">Cancel
            </x-secondary-button>
            <x-button wire:click="save">Save</x-button>
        </x-slot>
    </x-dialog-modal>
    {{--End edit modal--}}

    {{--Delete modal--}}
    <x-confirmation-modal wire:model.defer="showConfirmDeleteCertificate">
        <x-slot name="title">
            Confirm Delete
        </x-slot>
        <x-slot name="content">
            <p>Are you sure you want to delete this certificate details?</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showConfirmDeleteCertificate', false)"
                                class="mr-2">
                Cancel
            </x-secondary-button>
            <x-danger-button wire:click.prevent="delete()">Delete
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
    {{--End delete modal--}}
</div>
