@extends('layouts.app')

@section('content')


<header class="flex items-center mb-3 py-1">
    <div class="flex justify-between items-center w-full">

        <h2 class="text-md">My projects</h2>
        <a href="{{ route('create') }}" class="button bg-black text-white rounded shadow py-1 px-4"> New Project</a>

    </div>
</header>

    <main class="lg:flex flex-wrap -mx-0.25">
        @forelse ($projects as $project)
                <div class="lg:w-1/3 px-0.25 pb-6">

                    @include('projects.card')
                </div>
        @empty

                <div>No projects yet.</div>

        @endforelse

        </main>

@endsection
