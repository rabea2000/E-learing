@props(['file'])

<div  class="p-4 bg-white/5 rounded-xl flex justify-between  border  border-transparent hover:border-blue-600 group transition-colors duration-500" >
    <div class="flex justify-between gap-3">

        <div>
            <img src="{{  asset("images/". "pdflogo.png") }} "  class="rounded-xl" width=90 >
           
        </div>

        <div class="flex flex-col  ">
            <div class="flex-1">
                <p class="text-sm self-start text-gray-400">{{$file->name}}</p>
                <h3 class="fond-bold text-lg mt-1 group-hover:text-blue-600 transition-colors duration-500 ">
                    <a href="/files/{{$file->id}}">
                        {{$file->description}}
                    </a>
                </h3>
            </div>
            <p class="text-sm text-gray-400 "> class :{{ $file->classes_id}}</p>
            

        </div>
    </div>

    <div  class="flex flex-col justify-between">
        <div class=" self-end">
            {{-- <x-tag :tag="$job->tag"/>
            <x-tag>22h</x-tag> --}}
        </div>

        {{-- <div class="flex justify-between space-x-1">
            @foreach ($job->tags as $tag)
                <x-tag :tag="$tag" size='small'/>
            @endforeach
        </div> --}}

    </div>
</div>



