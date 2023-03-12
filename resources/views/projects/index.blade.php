<x-layout>
    <x-slot name="content">
        <!-- @if (isset($category))
<div class="  mb-4">
                    <a href="/projects" class="text-gray-700 text-sm p-2">&larr; Back to Projects</a>

                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mr-2 text-center">{{ $category->name }} Projects</h2>
                    </div>
@endif -->
        <div class="relative flex justify-center min-h-screen  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="mt-6 w-3/4 ">
                @if (count($projects))
                    <div class="text-xs mt-4 w-full text-right mb-2">{{ $projects->links() }}</div>
                @else
                    <div>Nothing to showcase, yet.</div>
                @endif
                <section class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" :showLink=isset($category) />
                    @endforeach
                </section>

                @if (count($projects))
                    <div class=" text-gray-700 text-sm float-right">{{ count($projects) }} projects to peep.</div>
                @else
                    <div>Nothing to showcase, yet.</div>
                @endif
            </div>

        </div>
    </x-slot>
</x-layout>
