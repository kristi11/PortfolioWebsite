<div class="p-6 border-t border-gray-200 md:border-l dark:border-gray-700">
    <div class="flex items-center">
        <x-icons.user_services/>
        <div class="ml-4 text-lg text-gray-600 font-semibold flex items-center">
            @if($services->isEmpty())
                <a href="#" class="dark:text-gray-100">Services</a>&nbsp;
                <a href="{{ route('services') }}">
                    <x-icons.edit/>
                </a>
            @else
                <a href="#" class="dark:text-gray-100">Services ({{ count($services) }})</a>&nbsp;
                <a href="{{ route('services') }}">
                    <x-icons.edit/>
                </a>
            @endif
        </div>
    </div>

    <x-section-border/>


    @if($services->isEmpty())
        <div class="p-6">
            <div class="text-sm text-gray-500">
                <div class="text-center text-gray-400 flex justify-center">
                    <x-icons.empty/>
                    &nbsp;What services do you offer?
                </div>
            </div>
        </div>
    @else
        @foreach($services as $service)
            <div class="border p-6 rounded-lg shadow-md bg-white mb-4 mt-6 dark:bg-gray-700">
                <div class="text-sm text-gray-500">
                    <div
                        class="font-semibold text-center"
                        style="overflow: auto;">
                        {{ ucwords($service->name) }}
                    </div>
                    <div>
                        <h2 class="text-center text-gray-400">{{ ucwords($service->type) }}</h2>
                    </div>
                    @if($service->description)
                        <div>
                            <h2 class="text-center text-gray-400">{{ $service->description }}</h2>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
