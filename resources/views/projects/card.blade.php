                <div class="bg-white mr-4 p-5 rounded shadow" style="height: 200px">
                    <h3 class="text-xl font-weight-bold mb-4">


                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                            <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z" />
                            <line x1="16" y1="8" x2="2" y2="22" />
                            <line x1="17.5" y1="15" x2="9" y2="15" />
                        </svg>
                        <a href="{{ route('show' , ['id' => $project->id]) }}">{{ $project->title }}</a>


                    </h3>

                    <div class="text-secondary pl-2 mb-4">{{ Illuminate\Support\Str::limit($project->description) }}</div>

                    <footer>
                        <form action="{{ route('delete' , ['id' => $project->id]) }}" method="POST" class="text-right">
                            @csrf
                            <button type="submit" class="text-xs">Delete</button>
                        </form>
                    </footer>


                </div>
