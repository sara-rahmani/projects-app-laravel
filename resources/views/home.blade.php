<x-layout>
    <x-slot name="content">

        <section
            class="flex flex-col h-screen text-gray-700 text-xl  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <h1 class="p-6 mb-2">Welcome Home</h1>
            <h2>Latest Projects</h2>
            @foreach ($projects as $index => $project)
            <section class="p-6 mb-2 w-96 bg-white overflow-hidden shadow  md:rounded-lg">


                <div class="col-span-3">
                   
                        <span class="text-sm"><h2  class="font-bold">{{ $project->title }}</h2>                
                              {{ $project->excerpt }}
                    </span>

                    </a>

                </div>

        </section>
        @endforeach
        <a href="/projects" class="px-3 py-2 hover:text-gray-400 bg-green-200 ">All Projects</a>

    </x-slot>
</x-layout>
