<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('Search Page') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900 dark:text-gray-100">
					<form action="{{ route('search') }}" method="get">

						<x-text-input id="query" type="text" class="block mt-1 w-full" name="query" placeholder='search'
							value="{{ request('query') }}" />

               <select name="replica" class="black mt-1 w-full">
                <option value="" > -- </option>
              <option value="posts_views_asc" @selected($request->replica == "posts_views_asc" )>Views (lowest first)</option>
              <option value="posts_views_desc" @selected($request->replica == "posts_views_desc" )>Views (highest first)</option>
            </select>

						<x-primary-button class="mt-3">
							Search
						</x-primary-button>

					</form>

           @if (isset($results))
          <div class="mt-3">
            @if (count($results)>0)
              <div>
               @foreach ($results as $result)
               <div class="mt-3 bg-gray-100 p-2">
                <h4 class="text-blue-500" >
                  {{ $result->title }}
                   <em class="inline-block text-gray-500" >({{ $result->views }}) Views</em>
                </h4>
                <p class="text-gray-700">{{ $result->body }}</p>
               </div>
               @endforeach
               <div class="mt-4">
                 {{ $results->appends($request->query())->links() }}
               </div>
              </div>
            @else
              no results are found
            @endif
          </div>
        @endif
				</div>

       

			</div>
		</div>
	</div>
</x-app-layout>
