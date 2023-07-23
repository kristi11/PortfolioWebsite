<div>
    <x-form-section submit="save">
        <x-slot name="title">
            Why Me
        </x-slot>
        <x-slot name="description">
            Explain why you would be the best choice for someone's business.
        </x-slot>
        <x-slot name="form">
            @forelse($whyMes as $whyMe)
                <div class="col-span-6">
                    <div class="bg-gray-50 p-6 border
						          mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <div>
                            <h1 class="text-gray-600 mb-6">
                                @if($whyMe->name)
                                    {{ ucwords($whyMe->name) }}
                                @endif
                            </h1>
                        </div>

                        @if($whyMe->description)
                            <div>
                                <h1 class="font-semibold text-xl dark:text-gray-100">{{ $whyMe->title }}</h1>
                            </div>
                            <div>
                                <h2 class="text-gray-600 mb-6 dark:text-gray-400">{{ $whyMe->description }}</h2>
                            </div>
                        @endif
                        <div class="flex justify-end">
                            {{--Edit modal--}}
                            <x-dialog-modal wire:model.defer="showWhyMeModal">
                                <x-slot name="title">
                                    Edit your details
                                </x-slot>
                                <x-slot name="content">
                                    {{--Your description--}}
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="description" value="{{ __('Description') }}" class="pt-6 pb-1"/>
                                        <textarea wire:model="whyMe.description" name="description" id="description"
                                                  cols="30" rows="10"
                                                  class="
						          mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                                  placeholder="Write something about this whyMe. Max 1000 characters"></textarea>
                                        <x-input-error for="whyMe.description" class="mt-2"/>
                                    </div>
                                    {{--End description end--}}
                                </x-slot>
                                <x-slot name="footer">
                                    <x-secondary-button wire:click="$set('showWhyMeModal', false)"
                                                        class="mr-2">
                                        Cancel
                                    </x-secondary-button>
                                    <x-button type="submit">Save</x-button>
                                </x-slot>
                            </x-dialog-modal>
                            {{--End Edit modal--}}
                            <x-secondary-button wire:click="edit({{ $whyMe->id }})" class="mr-3">
                                Edit
                            </x-secondary-button>
                            {{--Show delete modal--}}
                            <x-confirmation-modal wire:model.defer="showConfirmDeleteWhyMe">
                                <x-slot name="title">
                                    Confirm Delete
                                </x-slot>
                                <x-slot name="content">
                                    <p>Are you sure you want to delete your details?</p>
                                </x-slot>
                                <x-slot name="footer">
                                    <x-secondary-button wire:click="$set('showConfirmDeleteWhyMe', false)"
                                                        class="mr-2">
                                        Cancel
                                    </x-secondary-button>
                                    <x-danger-button wire:click.prevent="delete()">Delete
                                    </x-danger-button>
                                </x-slot>
                            </x-confirmation-modal>
                            {{--End show delete modal--}}
                            <x-danger-button wire:click.prevent="deleteId({{ $whyMe->id }})">
                                <x-icons.delete-skill/>
                            </x-danger-button>
                        </div>
                    </div>
                </div>
            @empty
                {{--<livewire:why-me-form/>--}}
                <div class="col-span-6">
                    {{--Why Me description--}}
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="description" value="{{ __('Description') }}" class="pt-6 pb-1"/>
                        <p class="text-gray-400 text-xs">Max 1000 characters</p>
                        <textarea wire:model="whyMe.description" name="description" id="description"
                                  cols="30" rows="10"
                                  class="border w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                  placeholder="Shortly explain why you would be the best choice for someone's business."></textarea>
                        <x-input-error for="whyMe.description" class="mt-2"/>
                    </div>
                    {{--End description end--}}
                </div>

            @endforelse
        </x-slot>
        @if($whyMes->isEmpty())
            <x-slot name="actions">
                <x-button>Save</x-button>
            </x-slot>
        @endif
    </x-form-section>
</div>
