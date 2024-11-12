<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">

                    <h2 class="font-bold text-xl">My Tasks</h2>
                    <div class="grid grid-cols-2 gap-8">
                    <div class="p-4 my-2 border border-gray-200 rounded-md">
                        <h3 class="font-bold text-lg">In Progress</h3>
                        
                        <ul role="list" class="divide-y divide-gray-100">
                            @foreach($in_progress as $task)
                            <li class="flex justify-between gap-x-6 py-5">
                              <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                  <p class="text-sm/6 font-semibold text-gray-900">{{$task->title}}</p>
                                  <p class="mt-1 truncate text-xs/5 text-gray-500">
                                        <span class="{{$task->priority == 1 ? 'bg-red-100 text-red-800' : ($task->priority == 2 ? 'bg-yellow-100 text-yellow-800' : 'bg-indigo-100 text-indigo-800') }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                        {{$task->priority == 1 ? 'I larte' : ($task->priority == 2 ? 'Mesatar' : 'I ulet')}}
                                        </span>
                                    </p>
                                </div>
                              </div>
                              <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm/6 text-gray-900">
                                    <span class="{{$task->status == false ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800' }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                        {{$task->status == false ? 'In progress' : 'Completed'}}
                                    </span>
                                </p>
                                <p class="mt-1 text-xs/5 text-gray-500">Last updated <time datetime="{{$task->updated_at}}">{{$task->updated_at->diffForHumans()}}</time></p>
                              </div>
                            </li>
                            @endforeach
                          </ul>
                    </div>
                    <div class="p-4 my-2 border border-gray-200 rounded-md">
                        <h3 class="font-bold text-lg">Completed</h3>
                        <ul role="list" class="divide-y divide-gray-100">
                            @foreach($completed as $task)
                            <li class="flex justify-between gap-x-6 py-5">
                              <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                  <p class="text-sm/6 font-semibold text-gray-900">{{$task->title}}</p>
                                  <p class="mt-1 truncate text-xs/5 text-gray-500">
                                        <span class="{{$task->priority == 1 ? 'bg-red-100 text-red-800' : ($task->priority == 2 ? 'bg-yellow-100 text-yellow-800' : 'bg-indigo-100 text-indigo-800') }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                        {{$task->priority == 1 ? 'I larte' : ($task->priority == 2 ? 'Mesatar' : 'I ulet')}}
                                        </span>
                                    </p>
                                </div>
                              </div>
                              <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm/6 text-gray-900">
                                    <span class="{{$task->status == false ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800' }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                        {{$task->status == false ? 'In progress' : 'Completed'}}
                                    </span>
                                </p>
                                <p class="mt-1 text-xs/5 text-gray-500">Last updated <time datetime="{{$task->updated_at}}">{{$task->updated_at->diffForHumans()}}</time></p>
                              </div>
                            </li>
                            @endforeach
                          </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
