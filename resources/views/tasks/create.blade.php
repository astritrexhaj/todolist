<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('tasks.store')}}" method="POST">
						@csrf
						@method('POST')
						<div class="space-y-12">
						  <div class="border-b border-gray-900/10 pb-12">
							<h2 class="text-base/7 font-semibold text-gray-900">Create Task</h2>
							<p class="mt-1 text-sm/6 text-gray-600">Add info to your task.</p>
					  
							<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
							  <div class="sm:col-span-4">
									<label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
									<div class="mt-2">
									  <input type="text" name="title" id="title" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
									  <x-input-error :messages="$errors->get('title')" class="mt-2" />
									</div>
							</div>
					  
							  <div class="col-span-full">
								<label for="description" class="block text-sm/6 font-medium text-gray-900">Pershkrimi</label>
								<div class="mt-2">
								  <textarea id="description" name="description" rows="5" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
								  <x-input-error :messages="$errors->get('description')" class="mt-2" />
								</div>
								<p class="mt-3 text-sm/6 text-gray-600">Pershkruani taskun me disa fjali.</p>
							  </div>

							  <div class="sm:col-span-3">
								<label for="priority" class="block text-sm/6 font-medium text-gray-900">Prioriteti</label>
								<div class="mt-2">
								  <select id="priority" name="priority" autocomplete="priority" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
									<option value="">Zgjidh prioritetin</option>
									<option value="1">I larte</option>
									<option value="2">Mesatare</option>
									<option value="3">I ulet</option>
								  </select>
								</div>
							  </div>
					  
							</div>
						  </div>
					  
						</div>
					  
						<div class="mt-6 flex items-center justify-end gap-x-6">
						  {{-- <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button> --}}
						  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
						</div>
					  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
