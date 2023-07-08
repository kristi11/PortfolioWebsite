@if($user->project->count() > 0)
	<section id="project" class="bg-white border-b py-8">
		<div class="container mx-auto flex flex-wrap pt-4 pb-12 justify-center">
			<h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
				Projects
			</h2>
			<div class="w-full mb-4">
				<div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
			</div>
			@foreach($user->project as $project)
				<div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink max-w-2xl">
					<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
						<a href="#" class="flex flex-wrap no-underline hover:no-underline">
							<p class="w-full text-gray-600 text-xs md:text-sm px-6 pt-3">
								@if($project->link)
									<a class="font-semibold text-indigo-700" target="_blank"
									   href="{{ url($project->link) }}">
										{{ ucwords($project->name) }}
									</a>
								@else
									{{ ucwords($project->name) }}
								@endif
							</p>
							<p class="text-gray-800 text-base px-6 mb-5">
								{{ $project->description }}
							</p>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</section>
@endif