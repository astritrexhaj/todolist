<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Task:') }} {{$task->title}}
            </h2>
            <a href="{{route('tasks.edit', $task->id)}}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="px-4 sm:px-0">
                          <h3 class="text-base/7 font-semibold text-gray-900">{{$task->title}}</h3>
                          <p class="mt-1 max-w-2xl text-sm/6 text-gray-500"><b class="text-gray-800">"{{$task->title}}"</b> task details</p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                          <dl class="divide-y divide-gray-100">
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                              <dt class="text-sm/6 font-medium text-gray-900">Title</dt>
                              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$task->title}}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Description</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$task->description}}</dd>
                            </div>

                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Status</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <span class="{{$task->status == false ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800' }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                        {{$task->status == false ? 'In progress' : 'Completed'}}
                                    </span>
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Priority</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                <span class="{{$task->priority == 1 ? 'bg-red-100 text-red-800' : ($task->priority == 2 ? 'bg-yellow-100 text-yellow-800' : 'bg-indigo-100 text-indigo-800') }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                    {{$task->priority == 1 ? 'I larte' : ($task->priority == 2 ? 'Mesatar' : 'I ulet')}}
                                </span>
                                </dd>
                            </div>
                            
                          </dl>
                        </div>
                      </div>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
