{{-- <header class="items-center  py-4 px-6 bg-white  uppercase font-bold text-black">
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
</header> --}}
<header class="items-center py-4 px-6 bg-white uppercase font-bold text-black">
    <nav class="flex justify-end  md:justify-between">
      <div class="flex items-center">
        <button id="menu-toggle" class="mr-2 md:hidden">
          {{-- <svg class="fill-current text-gray-600 hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path id="hamburger-icon" d="M3,6h18v2H3V6z M3,11h18v2H3V11z M3,16h18v2H3V16z"/>
            <path id="close-icon" d="M18,6L6,18M6,6l12,12"/>
          </svg> --}}
          <svg id="hamburger-icon" class="fill-current text-green-600 hover:text-green-400" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
            <path d="M3,6h18v2H3V6z M3,11h18v2H3V11z M3,16h18v2H3V16z"/>
          </svg>
          
          <svg id="close-icon" class="hidden fill-current text-green-600 hover:text-green-400" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
            <path d="M18,6L6,18M6,6l12,12"/>
          </svg>
          
        </button>
        <div class="hidden md:flex  md:items-center">
          <a href="/" class="px-3 py-2 hover:text-gray-400 text-xl">Home</a>
          <a href="/projects" class="px-3 py-2 hover:text-gray-400 text-sm">Projects</a>
          <a href="/about" class="px-3 py-2 hover:text-gray-400 text-sm">About</a>

        </div>
      </div>
  
      <div class="hidden md:flex  md:items-center">
        @auth
          <span class="px-3 py-2 text-sm">User: {{ auth()->user()->name }} </span>
          @if (auth()->user()->isAdmin())
            <a href="/admin" class="px-3 py-2 hover:text-gray-400 text-sm">Admin</a>
          @endif
          <a href="/logout" class="px-3 py-2 text-red-400 text-xl">Logout</a>
        @else
          <a href="/login" class="px-3 py-2 hover:text-green-200 text-xl">Log In</a>
        @endauth
      </div>
    </nav>
  
    <div id="menu" class="hidden flex justify-between md:hidden">
        <div>
        <a href="/" class="block py-2 px-4 text-xl hover:bg-gray-100">Home</a>

       
      
      <a href="/projects" class="block  py-2 px-4 text-sm hover:bg-gray-100">Projects</a>
      <a href="/about" class="block  py-2 px-4 text-sm hover:bg-gray-100">About</a>
      @auth

      <a href="/logout" class="block px-3 py-2 text-red-400 text-xl">Logout</a>
      @else
        <a href="/login" class="block px-3 py-2 hover:text-green-400 text-xl">Log In</a>
      @endauth
    </div>
      <div>
        @auth
          <span class="block px-3 py-2 underline text-sm">User: {{ auth()->user()->name }} </span>
          @if (auth()->user()->isAdmin())
            <a href="/admin" class="block px-3 py-2  hover:text-green-400 text-sm">Admin</a>
          @endif
          @endauth

      </div>
    </div>
  
    <script>
    //   const menuToggle = document.getElementById("menu-toggle");
    //   const menu = document.getElementById("menu");
  
    //   menuToggle.addEventListener("click", () => {
    //     menu.classList.toggle("hidden");
    //     const icon = document.getElementById("hamburger-icon");
    //     icon.classList.toggle("hidden");
    //     const closeIcon = document.getElementById("close-icon");
    //     closeIcon.classList.toggle("hidden");
    //   });
    const menuToggle = document.getElementById("menu-toggle");
    const menu = document.getElementById("menu");
    const hamburgerIcon = document.getElementById("hamburger-icon");
    const closeIcon = document.getElementById("close-icon");

    menuToggle.addEventListener("click", () => {
      menu.classList.toggle("hidden");
      hamburgerIcon.classList.toggle("hidden");
      closeIcon.classList.toggle("hidden");
    });
    </script>
  </header>
  