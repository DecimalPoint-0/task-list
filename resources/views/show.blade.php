@extends('layouts.app')
@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index')}}" 
            class="link"> ← Back to Task List</a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>
    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif

    <p class="mb-4">{{$task->created_at->diffForHumans()}} • 
        <small class="text-slate-500">Updated</small> 
        {{$task->updated_at->diffForHumans()}}</p>


    @if($task->completed)
        <span class="font-medium text-green-500">Completed</span>
    @else
        <span class="font-medium text-red-500">Not Completed</span>
    @endif

    <div class="flex space-x-10 mt-4">
        <div class="btn">
            <a href="{{ route('tasks.edit', ['task'=> $task])}}">Edit</a>
        </div>
    
        <div>
            <form action="{{ route('tasks.toggleComplete', ['task'=> $task])}}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn">
                    Mark as {{ $task->completed ? 'not completed': 'completed' }}
                </button>
            </form>
        </div>
    
        <form action="{{ route('tasks.destroy', ['task' => $task])}}" method='POST'>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection