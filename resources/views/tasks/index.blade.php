<x-app-layout>
    <div style="width: 900px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <div class="flex justify-between">
            <h1 class="text-xl uppercase text-gray-500">Tasks</h1>
            <a href="{{route('tasks.create')}}" class="flex items-center bg-gray-200 px-2 py-1 rounded hover:bg-gray-100 border-b-4 border-gray-400">
                <svg
                    class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"              stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>New Task</span>
            </a>
        </div>
        @include('partials.notifications')

        <table class="w-full table-auto mt-4">
            <thead>
            <tr class="text-left bg-gray-600 text-white uppercase text-base">
                <th class="px-2 py-2">Title</td>
                <th class="px-2 py-2">Details</td>
                <th class="px-2 py-2">Added Date</td>
                <th class="px-2 py-2">Status</th>
                <th class="px-2 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr class="bg-gray-200 hover:bg-gray-100">
                    <td class="px-2 py-4">{{$task->task_name}}</td>
                    <td class="px-2 py-4"><p>{{$task->task_details}}</p></td>
                    <td class="px-2 py-4"><p>{{date('d-m-Y H:i', strtotime($task->created_at)) }}</p></td>
                    <td class="px-2 py-4">
                        <form class="gap-2" method="POST" action="{{route('mark')}}">
                            @csrf
                            <input class="bg-gray-400 text-green-500" type="checkbox" name="id" value="{{$task->id}}" onClick="this.form.submit()" {{$task->task_status ? 'checked' : ''}}>
                            {{$task->task_status ? 'Complete' : 'Not Complete'}}
                            <input type="hidden" name="id" value="{{$task->id}}" />
                        </form>
                    </td>
                    <td class="px-2 py-4">
                        <table>
                            <tr>
                                <td>
                                    <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('are you sure you want to delete this task?')">
                                            <svg class="w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('tasks.edit', $task->id)}}" class="hover:text-gray-400">
                                        <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('tasks.show', $task->id)}}" class="hover:text-gray-400">
                                        <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-8 text-center">
            <a href="{{route('dashboard')}}">
                <svg class="w-8 inline hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</x-app-layout>
