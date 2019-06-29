<div class="bg-white mr-4 p-5 rounded shadow mt-3 text-xs">
    <ul>
        @foreach ($project->activity as $activity)
            <li class="mb-1">

                @include ("projects.activity.{$activity->description}")
                    <span class="text-grey"><small>{{ $activity->created_at->diffForHumans() }}</small></span>

            </li>
        @endforeach
    </ul>
</div>
