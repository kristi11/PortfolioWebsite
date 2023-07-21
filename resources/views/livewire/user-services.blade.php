<div>
    @if($services->isNotEmpty())
        <div class="flex justify-end mr-3" title="Add another service">
            <x-button wire:click="addService" class="dark:hover:text-gray-100">
                Add Service
            </x-button>
        </div>
    @endif

    <x-form-section submit="save" class="py-10">
        <x-slot name="title">
            {{ __('Services') }}
        </x-slot>

        <x-slot name="description">
            {{ __("
                    What services do you offer?
                  ")
            }}
        </x-slot>

        <x-slot name="form">
            @forelse($services as $service)
                <div class="col-span-6">
                    <div class="bg-gray-50 p-6 border
						          mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <div>
                            <h1 class="font-semibold text-xl dark:text-gray-100">Service</h1>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-gray-600 dark:text-gray-400">
                                {{ ucwords($service->name) }}
                            </h2>
                        </div>

                        <div>
                            <h1 class="font-semibold text-xl dark:text-gray-100">Service description</h1>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-gray-600 dark:text-gray-400">{{ $service->description }}</h2>
                        </div>
                        <div class="flex justify-end">
                            {{--Show Edit modal--}}
                            <x-secondary-button wire:click="edit({{$service->id}})" class="mr-3">Edit
                            </x-secondary-button>
                            {{--End Edit modal--}}
                            {{--Show delete modal--}}
                            <x-danger-button wire:click.prevent="deleteId({{ $service->id }})">
                                Delete
                            </x-danger-button>
                            {{--End show delete modal--}}
                        </div>
                    </div>
                </div>
            @empty
                @include('serviceForm')
            @endforelse
        </x-slot>
        @unless(count($services) >= 1)
            <x-slot name="actions">
                <x-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button>
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        @endunless
    </x-form-section>
    {{--Edit modal--}}
    <x-dialog-modal wire:model.defer="showServiceModal">
        <x-slot name="title">
            Edit your Service details
        </x-slot>
        <x-slot name="content">
            @include('serviceForm')
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showServiceModal', false)" class="mr-2"> Cancel
            </x-secondary-button>
            <x-button wire:click="save">Save</x-button>
        </x-slot>
    </x-dialog-modal>
    {{--End Edit modal--}}

    {{--Delete modal--}}
    <x-confirmation-modal wire:model.defer="showConfirmDeleteService">
        <x-slot name="title">
            Confirm Delete
        </x-slot>
        <x-slot name="content">
            <p>Are you sure you want to delete this service details?</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showConfirmDeleteService', false)"
                                class="mr-2">
                Cancel
            </x-secondary-button>
            <x-danger-button wire:click.prevent="delete()">Delete
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
    {{--End Delete modal--}}
</div>

