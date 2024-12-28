@extends('layouts.app')

@section('title', 'The List of Tasks')

@section('content')
<nav class="mb-4">
    <a href="{{ route('tasks.create')}}" class="link">Creat New Task</a>
</nav class="mb-4">
<div>
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id])}}" 
                @class(['line-through text-gray-500'=>$task->completed])>{{$task->title}}</a>
        </div>
    @empty
        <div>There are no tasks</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
</div>
@endsection