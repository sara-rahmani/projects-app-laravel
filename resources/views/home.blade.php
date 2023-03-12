<x-layout>
    <x-slot name="content">

        <section class="flex flex-col  min-h-screen text-gray-700 text-xl  bg-gray-100 dark:bg-gray-900 items-center py-4 sm:pt-0">
            <h1 class="p-6 mb-2">Welcome Home</h1>
            <div class="my-4 py-4 bg-white  text-center ">

                <span class="text-sm">
                    <h2 class="font-bold">{{ $mainProject->title }}</h2>
                    {{ $mainProject->excerpt }}
                </span>


                <div class="slideshow  grid sm:grid-cols-3 gap-2 items-center p-4  grid-cols-1">
                   
                    <img src="{{ url('storage/images/dice-game-1.png') }}"
                        class="hidden col-span animate-slide-in-top  rounded-lg">
                    
                    <img src="{{ url('storage/images/dice-game-3.png') }}"
                        class="hidden col-span animate-slide-in-top  rounded-lg">
                        <img src="{{ url('storage/images/dice-game-2.png') }}"
                        class="hidden col-span animate-slide-in-top rounded-lg ">
                </div>

                <a href="/projects/{{ $mainProject->slug }}"
                    class="px-3 py-2 hover:text-gray-400 bg-green-200 rounded-lg float-right">More details</a>






            </div>
            <h2>Latest Projects</h2>
            <div class="flex flex-col items-center gap-y-4 sm:grid grid-cols-2 sm: gap-x-4 ">

                @foreach ($projects as $index => $project)
                    <section class="p-6 mb-2 bg-white overflow-hidden shadow  rounded-lg ">


                        <div class="grid grid-rows gap-2 justify-center">
                                <h2 class="font-bold text-center">{{ $project->title }}</h2>
                                @if ($project->thumb)
                                    <img src="{{ url('storage/' . $project->thumb) }}" alt="Placeholder Thambnail" class="h-80"/>
                                @else
                                    <img src="{{ url('storage/images/placeholder-thumbnail.jpeg') }}" alt="Placeholder Thambnail" class="h-80" />
                                @endif


                        </div>

                    </section>
                @endforeach

            </div>
            <a href="/projects" class="px-3 py-2 hover:text-gray-400 bg-green-200 ">All Projects</a>
        </section>
    </x-slot>
</x-layout>
<style>
    @keyframes slide-in-top {
        0% {
            opacity: 0;
            transform: translateY(-100%);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slide-in-top {
        animation-name: slide-in-top;
        animation-duration: 1s;
        animation-timing-function: ease-out;
    }
</style>
<script>
    const images = document.querySelectorAll('.slideshow  img');
    let currentImageIndex = 0;
    images[currentImageIndex].classList.remove('hidden');
    setInterval(() => {
        //   images[currentImageIndex].classList.add('hidden');
        currentImageIndex = (currentImageIndex + 1) % images.length;
        images[currentImageIndex].classList.remove('hidden');

    }, 2000);
</script>
