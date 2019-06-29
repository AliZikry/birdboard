@extends('layouts.app')

@section('content')

<header class="flex items-center mb-3 py-1">
    <div class="flex justify-between items-center w-full">
        <p class="text-md">
           <a href="{{ route('index') }}"> My projects </a> / <a href="{{ route('show' , ['id' => $project->id]) }}">{{ $project->title }}</a>
        </p>
        <a href="{{ route('edit' , ['id' => $project->id]) }}" class="button bg-black text-white rounded shadow py-1 px-4"> Edit Project</a>

    </div>
</header>

<main>
    <div class="lg:flex">
        <div class="lg:w-3/4 mb-3">
            <div class="mb-3">
            <h2 class="text-md mb-1">Tasks</h2>

                {{-- tasks --}}
                @foreach ($project->tasks as $task)
                    <div class="bg-white mr-4 p-5 rounded shadow mb-3">
                        <form action="{{ route('updateTasks' , ['id' => $project->id , $task->id]) }}" method="POST">
                            {{-- @method('PATCH') --}}
                            @csrf
                           <div class="flex">
                                    <input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-grey' : '' }}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            </div>
                        </form>
                    </div>

                    @endforeach

                      <div class="bg-white mr-4 p-5 rounded shadow mb-3">
                    <form action="{{ route('storeTasks' , ['id' => $project->id]) }}" method="POST">
                            @csrf
                                <input placeholder="Add a new task..." class="w-full" name="body">
                        </form>
                    </div>




            </div>

            <div>
            <h2 class="text-md mb-1">General Notes</h2>
                <form method="POST" action="{{ route('update' , ['id' => $project->id]) }}">
                    @csrf
                <textarea
                    name="notes"
                    class="bg-white mr-4 p-5 rounded shadow w-full mb-4"
                    placeholder="Anything special that you want to make note of?"
                    style="min-height: 200px;overflow: auto">
                        {{ $project->notes }}
                </textarea>
                <button type="submit" class="button ">Save</button>
                </form>
                    @if ($errors->any())
                        <div class="field mt-6">
                                @foreach($errors->all() as $error)
                                    <li class="text-small text-red">{{ $error }}</li>
                                @endforeach
                        </div>
                    @endif
            </div>

        </div>
        <div class="lg:w-1/4 ml-3">

            @include('projects.card')

            @include('projects.activity.card')

        </div>
    </div>
</main>



@endsection
