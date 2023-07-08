<div class="col-span-6">
	<div class="col-span-6 sm:col-span-4">
		<x-label for="name" value="{{ __('Name') }}" class="pt-6"/>
		<x-input wire:model="certificate.name" id="name" type="text" class="mt-1 block w-full"
		             placeholder="Ex: Developing ASP.NET MVC Web Applications"
		/>
		<x-input-error for="certificate.name" class="mt-2"/>
	</div>

	<div class="col-span-6 sm:col-span-4">
		<x-label for="organization" value="{{ __('Issuing organization') }}" class="pt-6"/>
		<x-input wire:model="certificate.organization" id="organization" type="text" class="mt-1 block w-full"
		             placeholder="Ex: Microsoft"
		/>
		<x-input-error for="certificate.organization" class="mt-2"/>
	</div>

	<div class="flex col-span-6 sm:col-span-4">
		<div class="w-1/2 mr-3">
			<x-label for="credentialID" value="{{ __('Credential ID') }}" class="pt-6"/>
			<p class="text-gray-500 text-xs">{{ __('Credential ID is not required, but highly recommended.') }}</p>
			<x-input wire:model="certificate.credentialID" id="credentialID" type="text" class="mt-1 block w-full"
			             placeholder="Credential ID"
			/>
			<x-input-error for="certificate.credentialID" class="mt-2"/>
		</div>
		<div class="w-1/2">
			<x-label for="credentialURL" value="{{ __('Credential URL') }}" class="pt-6"/>
			<p class="text-gray-500 text-xs">{{ __('Credential URL is not required, but highly recommended.') }}</p>
			<x-input wire:model="certificate.credentialURL" id="credentialURL" type="url" class="mt-1 block w-full"
			             placeholder="Credential URL"
			/>
			<x-input-error for="certificate.credentialURL" class="mt-2"/>
		</div>
	</div>

	{{--Certificate description--}}
	<div class="col-span-6 sm:col-span-4">
		<x-label for="description" value="{{ __('Description') }}" class="pt-6 pb-1"/>
		<textarea wire:model="certificate.description" name="description" id="description"
		          cols="30" rows="10"
		          class="border w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
		          placeholder="Write something about what this certificate entails to. Max 1000 characters."></textarea>
		<x-input-error for="certificate.description" class="mt-2"/>
	</div>
	{{--End certificate description--}}

	{{--        ------------------------------------------------------------------------------------------------------------------}}
	{{--        certificate start--}}
	<div class="flex col-span-6 sm:col-span-4">
		<div class="w-1/2 mr-3">
			<x-label for="month_started" value="{{ __('Month issued') }}" class="pt-6"/>
			<select wire:model="certificate.month_started"
			        id="month_started"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select month</option>
				@foreach(\App\Models\Functions::getMonths() as $number => $name)
					<option value="{{ $number }}">{{ $name }}</option>
				@endforeach
			</select>
			<x-input-error for="certificate.month_started" class="mt-2"/>
		</div>
		<div class="w-1/2">
			<x-label for="year_started" value="{{ __('Year issued') }}" class="pt-6"/>
			<select wire:model="certificate.year_started"
			        id="year_started"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select year</option>
				@foreach(\App\Models\Functions::getYears() as $years)
					<option value="{{$years}}">{{$years}}</option>
				@endforeach
			</select>
			<x-input-error for="certificate.year_started" class="mt-2"/>
		</div>
	</div>
	{{--        End certificate start--}}
	{{--        -------------------------------------------------------------------------------------------------------}}
	{{--        certificate end--}}
	<div class="flex col-span-6 sm:col-span-4">
		<div class="w-1/2 mr-3">
			<x-label for="month_ended" value="{{ __('Month expires') }}" class="pt-6"/>
			<p class="text-gray-500 text-xs">{{ __('If this certificate or license does not expire, you do not need to select this.') }}</p>
			<select wire:model="certificate.month_ended"
			        id="month_ended"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select month</option>
				@foreach(\App\Models\Functions::getMonths() as $number => $name)
					<option value="{{ $number }}">{{ $name }}</option>
				@endforeach
			</select>
			<x-input-error for="certificate.month_ended" class="mt-2"/>
		</div>
		<div class="w-1/2">
			<x-label for="year_ended" value="{{ __('Year expires') }}" class="pt-6"/>
			<p class="text-gray-500 text-xs">{{ __('If this certificate or license does not expire, you do not need to select this.') }}</p>
			<select wire:model="certificate.year_ended"
			        id="year_ended"
			        type="text"
			        class="mt-1 block w-full focus:ring
                              focus:ring-opacity-50
                               border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
				<option value="" selected>Select year</option>
				@foreach(\App\Models\Functions::getYears() as $years)
					<option value="{{$years}}">{{$years}}</option>
				@endforeach
			</select>
			<x-input-error for="certificate.year_ended" class="mt-2"/>
		</div>
	</div>
	{{--        End certificate end--}}
</div>
