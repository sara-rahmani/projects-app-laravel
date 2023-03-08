@props(['project', 'showBody' => false, 'showLink' => false])

<div class="p-6  bg-white overflow-hidden shadow  md:rounded-lg">
    <div>
        <a href="/projects/{{ $project->slug }}" class="font-bold text-2xl">{{ $project->title }}</a>
    </div>


    <!-- <div class="mb-4 flex flex-col wrap items-center">  -->
    @if ($showBody)

        <div class=" grid grid-cols-1 gap-3 items-center">
            @if ($project->image)
                <img src="{{ url('storage/' . $project->image) }}" alt="Placeholder Image" class="w-5/6 my-2" />
            @else
                <img src="{{ url('storage/images/placeholder-image.png') }}" alt="Placeholder Image" class="w-5/6 my-2" />
            @endif
            <div class="text-gray-700 flex flex-col gap-2">{!! $project->body !!}</div>
        </div>
    @else
        <div class="grid grid-cols-3 gap-3 items-center">

            @if ($project->thumb)
                <img src="{{ url('storage/' . $project->thumb) }}" alt="Placeholder Thambnail" />
            @else
                <img src="{{ url('storage/images/placeholder-thumbnail.jpeg') }}" alt="Placeholder Thambnail" />
            @endif
            <div class="text-gray-700 col-span-2">{!! $project->excerpt !!}</div>
        </div>
    @endif
    <!-- @if ($showBody)
<div class=" grid grid-cols-1 gap-3">

   <img src="{{ url('storage/images/placeholder-image.png') }}" />

    <div class="text-gray-700">{!! $project->body !!}
</div>
</div>
@else
<div class=" grid grid-cols-3 gap-3">

<img src="{{ url('storage/images/placeholder-thumbnail.jpeg') }}" />

<div class="text-gray-700 col-span-2">{!! $project->excerpt !!}</div>
</div>
@endif -->




    {{-- @if ($project->category)
        <div> <span class="text-gray-700 text-sm p-2">Category: {{ $project->category->name }}</span>
            @if (!$showLink)
            <a href="/categories/{{ $project->category->slug }}">...</a>
        @endif

        </div>
    @endif --}}
    @if ($project->category)
    <div> <span class="text-gray-700 text-sm p-2">Category:
        <a href="/categories/{{ $project->category->slug }}"> {{ $project->category->name }}</a>
</span>
    </div>
@endif
    @if (count($project->tags))
    <div> 
        <span class="text-gray-700 text-sm p-2">
        Tags: 
        @foreach ($project->tags as $tag)
            
        <a href="/tags/{{ $tag->slug }}"> {{ $tag->name }}</a>
        @endforeach

    </span>
       

    </div>
@endif
  

</div>
