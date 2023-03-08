<header class="items-center  py-4 px-6 bg-white  uppercase font-bold text-black">
    <nav class="flex justify-between">
        <div>
            <a href="/" class="px-3 py-2 hover:text-gray-400 text-xl">Home</a>
            <a href="/projects" class="px-3 py-2 hover:text-gray-400 text-sm">Projects</a>
            <a href="/about" class="px-3 py-2 hover:text-gray-400 text-sm">About</a>
        </div>

        <div>

            @auth
                <span class="px-3 py-2  text-sm">User: {{ auth()->user()->name }} </span>
                @if (auth()->user()->isAdmin())
                    <a href="/admin" class="px-3 py-2 hover:text-gray-400 text-sm">Admin</a>
                @endif
                <a href="/logout" class="px-3 py-2 hover:text-red-400 text-xl">Logout</a>
            @else
                <a href="/login" class="px-3 py-2 hover:text-green-400 text-xl">Log In</a>

            @endauth


        </div>
    </nav>
</header>
