<x-layout>
    <x-slot name="content">

        <h2 class="text-center uppercase">Admin</h2>
        <!----------------- Projects ------------->

        <div class=" flex justify-center  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="flex flex-col p-6 m-6 w-1/2  bg-white overflow-hidden shadow  md:rounded-lg">
                <h3>Projects</h3>

                <a href="/admin/projects/create"
                    class="bg-green-700 text-white rounded py-2 my-2 px-4 hover:bg-green-600 self-end ">Create
                    project</a>

                @foreach ($projects as $index => $project)
                    <section class="grid grid-cols-4  {{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white-20' }}">

                        <div class="col-span-3">
                            <a href="/projects/{{ $project->slug }}">
                                <span class="text-sm">{{ $project->title }}</span>
                            </a>

                        </div>

                        <div class="col-span-1">
                            <a href="/admin/projects/{{ $project->id }}/edit" class="text-sm">Edit
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>

                            <form method="POST" action="/admin/projects/{{ $project->id }}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600">Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </section>
                @endforeach


            </div>
        </div>
        <!----------------- Users ------------->

        <div class=" flex justify-center  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="flex flex-col p-6 m-6 w-1/2  bg-white overflow-hidden shadow  md:rounded-lg">
                <h3>Users</h3>
                <a href="/admin/users/create"
                    class="bg-green-700 text-white rounded py-2 my-2 px-4 hover:bg-green-600 self-end ">Create user</a>

                @foreach ($users as $index => $user)
                    <section class="grid grid-cols-4  {{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white-20' }}">

                        <div class="col-span-3"> <span>{{ $user->name }}</span></div>
                        <div class="col-span-1">

                            <a href="/admin/users/{{ $user->id }}/edit" class="text-sm">Edit
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                   
                            @if($user->id !== $loggedInUser)

                            <form method="POST" action="/admin/users/{{ $user->id }}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600">Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                            @endif
                        </div>
                    </section>
                @endforeach

            </div>

        </div>

        <!----------------- Categories ------------->

        <div class=" flex justify-center  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="flex flex-col p-6 m-6 w-1/2  bg-white overflow-hidden shadow  md:rounded-lg">
                <h3>Categories</h3>
                <a href="/admin/categories/create"
                    class="bg-green-700 text-white rounded py-2 my-2 px-4 hover:bg-green-600 self-end ">Create
                    Category</a>

                @foreach ($categories as $index => $category)
                    <section class="grid grid-cols-4  {{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white-20' }}">

                        <div class="col-span-3"> <span>{{ $category->name }}</span></div>
                        <div class="col-span-1">

                            <a href="/admin/categories/{{ $category->id }}/edit" class="text-sm">Edit
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>

                            <form method="POST" action="/admin/categories/{{ $category->id }}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600">Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </section>
                @endforeach

            </div>

        </div>


  <!----------------- Tags ------------->

  <div class=" flex justify-center  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="flex flex-col p-6 m-6 w-1/2  bg-white overflow-hidden shadow  md:rounded-lg">
        <h3>Tags</h3>
        <a href="/admin/tags/create"
            class="bg-green-700 text-white rounded py-2 my-2 px-4 hover:bg-green-600 self-end ">Create
            Tag</a>

        @foreach ($tags as $index => $tag)
            <section class="grid grid-cols-4  {{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white-20' }}">

                <div class="col-span-3"> <span>{{ $tag->name }}</span></div>
                <div class="col-span-1">

                    <a href="/admin/tags/{{ $tag->id }}/edit" class="text-sm">Edit
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </a>

                    <form method="POST" action="/admin/tags/{{ $tag->id }}/delete" class="inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-red-600">Delete
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </form>

                </div>
            </section>
        @endforeach

    </div>

</div>
    </x-slot>
</x-layout>
