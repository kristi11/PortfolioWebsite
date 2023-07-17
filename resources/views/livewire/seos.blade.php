<div>
    <x-form-section submit="save">
        <x-slot name="title">
            SEO
        </x-slot>
        <x-slot name="description">
            {{__('Improve your chances of getting discovered on google. If no seo title is provided the application name will be used.')}}
        </x-slot>
        <x-slot name="form">
            @forelse($seos as $seo)
                <div class="col-span-6">
                    <div class="bg-gray-50 p-6 border
						          mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <div>
                            <h1 class="font-semibold text-xl dark:text-gray-100">Title</h1>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-gray-600 dark:text-gray-400">{{ $seo->title !== null && $seo->title !== '' ? $seo->title : 'If no seo title is provided the application name will be used. You can change this any time.' }}</h2>
                        </div>

                        <div>
                            <h1 class="font-semibold text-xl dark:text-gray-100">Description</h1>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-gray-600 dark:text-gray-400">{{ $seo->description !== null && $seo->description !== '' ? $seo->description : 'Enter a description of what your website is about to improve google search' }}</h2>
                        </div>

                        {{--Edit button--}}
                        <div class="flex justify-end">
                            <x-secondary-button wire:click="edit({{ $seo->id }})" class="mr-2">Edit
                            </x-secondary-button>
                            {{--End edit button--}}
                            {{--Edit modal--}}
                            <x-dialog-modal wire:model="showSEOModal">
                                <x-slot name="title">
                                    Edit SEO details
                                </x-slot>

                                <x-slot name="content">
                                    <x-seo-form/>
                                </x-slot>

                                <x-slot name="footer">
                                    <x-secondary-button class="mr-2"
                                                        wire:click="$set('showSEOModal', false)">Cancel
                                    </x-secondary-button>
                                    <x-button wire:click="save">Save</x-button>
                                </x-slot>
                            </x-dialog-modal>
                            {{--End edit modal--}}
                            {{--Delete button--}}
                            <x-danger-button wire:click.prevent="deleteId({{ $seo->id }})">
                                <x-icons.delete-skill/>
                            </x-danger-button>
                            {{--End delete button--}}
                            {{--Delete modal--}}
                            <x-confirmation-modal wire:model.defer="showConfirmDeleteSEO">
                                <x-slot name="title">
                                    Confirm Delete
                                </x-slot>
                                <x-slot name="content">
                                    <p>Are you sure you want to delete SEO details?</p>
                                </x-slot>
                                <x-slot name="footer">
                                    <x-secondary-button wire:click="$set('showConfirmDeleteSEO', false)"
                                                        class="mr-2">
                                        Cancel
                                    </x-secondary-button>
                                    <x-danger-button wire:click.prevent="delete()">Delete
                                    </x-danger-button>
                                </x-slot>
                            </x-confirmation-modal>
                            {{--End delete modal--}}
                        </div>
                    </div>
                </div>
            @empty
                <x-seo-form/>
            @endforelse
        </x-slot>
        @if($seos->isEmpty())
            <x-slot name="actions">
                <x-button>Save</x-button>
            </x-slot>
        @endif
    </x-form-section>
</div>
