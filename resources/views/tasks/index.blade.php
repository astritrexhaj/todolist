<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <a href="{{route('tasks.create')}}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (\Session::has('message'))
                        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                            <span class="font-medium">Success alert!</span> {{\Session::get('message')}}.
                            </div>
                        </div>
                    @endif
                    @if(count($tasks) > 0)
                        <form method="GET" action={{route('tasks')}}>
                            <div class="flex justify-end items-center gap-4 mb-4">
                                <div class="sm:col-span-3 flex items-center">
                                    <label for="priority" class="block text-sm/6 font-medium text-gray-900">Prioriteti</label>
                                    <div class="ml-2">
                                      <select id="priority" name="priority" autocomplete="priority" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                                        <option value="">Zgjidh prioritetin</option>
                                        <option value="1" {{request()->get('priority') == 1 ? 'selected' : ''}}>I larte</option>
                                        <option value="2" {{request()->get('priority') == 2 ? 'selected' : ''}}>Mesatare</option>
                                        <option value="3" {{request()->get('priority') == 3 ? 'selected' : ''}}>I ulet</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-3 flex items-center">
                                    <label for="status" class="block text-sm/6 font-medium text-gray-900">Statusi</label>
                                    <div class="ml-2">
                                      <select id="status" name="status" autocomplete="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                                        <option value="">Zgjidh statusin</option>
                                        <option value="0" {{request()->get('status') && request()->get('status') == 0 ? 'selected' : ''}}>Ne progress</option>
                                        <option value="1" {{request()->get('status') == 1 ? 'selected' : ''}}>I Perfunduar</option>
                                      </select>
                                    </div>
                                </div>
                                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search</button>
                            </div>
                        </form>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden ">
                                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                        Title
                                                    </th>
                                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                                        Priority
                                                    </th>
                                                    <th scope="col" class="p-4">
                                                        <span class="sr-only">Actions</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach($tasks as $task)
                                                <tr class="hover:bg-gray-100">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{$task->title}}
                                                    </td>
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap">
                                                        <span class="{{$task->status == false ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800' }} text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                            {{$task->status == false ? 'In progress' : 'Completed'}}
                                                        </span>
                                                    </td>
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        <span class="{{$task->priority == 1 ? 'bg-red-100 text-red-800' : ($task->priority == 2 ? 'bg-yellow-100 text-yellow-800' : 'bg-indigo-100 text-indigo-800') }} text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                            {{$task->priority == 1 ? 'I larte' : ($task->priority == 2 ? 'Mesatar' : 'I ulet')}}
                                                        </span>
                                                    </td>
                                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap flex justify-end items-center gap-2">
                                                        <a href="{{route('tasks.show', $task->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                                        <a href="{{route('tasks.edit', $task->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:underline">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="px-4 py-2 bg-gray-100">
                                            {{$tasks->appends($_GET)->links()}}
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="block">
                            <div class="flex items-center p-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                  <span class="font-medium">Warning alert!</span> There are no tasks available.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
