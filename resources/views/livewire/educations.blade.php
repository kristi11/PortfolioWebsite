<x-form-section submit="save" class="py-10">
    <x-slot name="title">
        {{ __('Education') }}
    </x-slot>

    <x-slot name="description">
        {{ __("
                Enter some information about your education.
              ")
        }}
    </x-slot>

    <x-slot name="form">
        @forelse($educations as $education)
            <div class="col-span-6">
                <div class="bg-gray-50 p-6 border
						     mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <div>
                        <h1 class="font-semibold text-xl dark:text-gray-100">School</h1>
                    </div>
                    <div class="mb-6">
                        <h2>
                            <a class="font-semibold text-indigo-700 dark:text-indigo-300" target="_blank"
                               href="{{ url($education->link) }}">{{ ucwords($education->school) }}
                            </a>
                        </h2>
                    </div>

                    <div>
                        <h1 class="font-semibold text-xl dark:text-gray-100">School location</h1>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-gray-600 dark:text-gray-400">{{ $education->country }}</h2>
                    </div>

                    <div>
                        <h1 class="font-semibold text-xl dark:text-gray-100">Degree</h1>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-gray-600 dark:text-gray-400">{{ $education->degree }}</h2>
                    </div>

                    <div>
                        <h1 class="font-semibold text-xl dark:text-gray-100">Field</h1>
                    </div>
                    <div>
                        <h2 class="text-gray-600 mb-6 dark:text-gray-400">{{ ucwords($education->field) }}</h2>
                    </div>

                    <div>
                        <h1 class="font-semibold text-xl dark:text-gray-100">Academic years</h1>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-gray-600 dark:text-gray-400">
                            @if($education->month_ended && $education->year_ended)
                                Between {{ Carbon\Carbon::createFromFormat('m', $education->month_started)->format('F') }}
                                {{ $education->year_started }}
                                and {{ Carbon\Carbon::createFromFormat('m', $education->month_ended)->format('F') }}
                                {{ $education->year_ended }}
                            @else
                                Started
                                in {{ Carbon\Carbon::createFromFormat('m', $education->month_started)->format('F') }}
                                {{ $education->year_started }} and currently in school.
                            @endif
                        </h2>
                    </div>
                    <div class="flex justify-end">
                        {{--					Show Edit modal--}}
                        <x-secondary-button wire:click="edit({{$education->id}})" class="mr-3">Edit
                        </x-secondary-button>
                        {{--					End Edit modal--}}
                        {{--					Edit modal--}}
                        <x-dialog-modal wire:model.defer="showEditEducation">
                            <x-slot name="title">
                                Edit your Education details
                            </x-slot>
                            <x-slot name="content">
                                @include('educationForm')
                            </x-slot>
                            <x-slot name="footer">
                                <x-secondary-button wire:click="$set('showEditEducation', false)" class="mr-2"> Cancel
                                </x-secondary-button>
                                <x-button wire:loading.class="opacity-50" type="submit">Save</x-button>
                            </x-slot>
                        </x-dialog-modal>
                        {{--					End Edit modal--}}
                        {{--					Show delete modal--}}
                        <x-confirmation-modal wire:model.defer="showConfirmDeleteEducation">
                            <x-slot name="title">
                                Confirm Delete
                            </x-slot>
                            <x-slot name="content">
                                <p>Are you sure you want to delete your Education details?</p>
                            </x-slot>
                            <x-slot name="footer">
                                <x-secondary-button wire:click="$set('showConfirmDeleteEducation', false)"
                                                    class="mr-2">
                                    Cancel
                                </x-secondary-button>
                                <x-danger-button wire:click.prevent="delete()">Delete
                                </x-danger-button>
                            </x-slot>
                        </x-confirmation-modal>
                        {{--					End show delete modal--}}
                        <x-danger-button wire:click.prevent="deleteId({{ $education->id }})">
                            Delete
                        </x-danger-button>
                    </div>
                </div>
            </div>
        @empty
            @include('educationForm')
        @endforelse
    </x-slot>
    @unless(count($educations) >= 1)
        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button wire:loading.class="opacity-50">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    @endunless
</x-form-section>
