<x-layout>
    <x-slot name="content">
        <a href="/projects" class="text-gray-700 text-sm p-2">&larr; Back to Projects</a>
        <div class="relative flex w-3/4 justify-center m-auto  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            {{-- <div class="p-6 m-6 w-3/4 justify-center bg-white overflow-hidden shadow  md:rounded-lg"> --}}
                <x-projects.project-card :project="$project" :showBody="true" />



            </div>
        </div>
    </x-slot>
</x-layout>
