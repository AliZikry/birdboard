@extends('layouts.app')

@section('content')


    <form method="POST" action="{{ route('update' , ['id' => $project->id]) }}">
        @csrf
    <h1 class="heading is-1">Edit Your Project</h1>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="title">Title</label>

            <div class="control">
                <input
                        type="text"
                        class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full"
                        name="title"
                        placeholder="My next awesome project"
                        required
                        value="{{ $project->title }}">
            </div>
        </div>

        <div class="field mb-6">
            <label class="label text-sm mb-2 block" for="description">Description</label>

                <div class="control">
                    <textarea
                        name="description"
                        rows="10"
                        class="textarea bg-transparent border border-muted-light rounded p-2 text-xs w-full"
                        placeholder="I should start learning piano."
                        required>{{ $project->description }}</textarea>
                </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
                <a href="{{ route('index') }}">Cancel</a>
            </div>
        </div>

         @if ($errors->any())
                <div class="field mt-6">
                        @foreach($errors->all() as $error)
                            <li class="text-small text-red">{{ $error }}</li>
                        @endforeach
                </div>
        @endif

    </form>
@endsection
