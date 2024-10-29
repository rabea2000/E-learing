
<x-layout>


    <x-course.course-side-bar :videos="$videos"/>
    <x-dashboard.mainsection class="lg:mr-80">


    
    
        <div class="mx-5 h-auto w-11/12 max-w-5xl">
  
            
            {{-- <x-course.video video_url="{{$lesson->url}}" /> --}}
            <x-course.video video_url="{{$signe_url}}" />
            {{-- <x-course.video video_url="{{asset("/".Storage::disk('public')->url($lesson->url))  }}" /> --}}
           
            <x-course.videocaption :lesson="$lesson"   />

            <button type="button" class=" my-6 w-full h-20 rounded-lg border border-gray-500 bg-gray-100  text-right p-4  hover:bg-gray-300 "
            onclick="showreplyfield('تعليق على الفيديو' , '/comment/upload' ,'video_id', '{{$lesson->id}}')">
             اكتب تعليق.....</button>

             <x-breakline /> 

                <div class=" space-y-6 mt-3">
            @foreach ($lesson->comment as $comment)  
                <x-course.comment :comment="$comment"/> 
                
               @foreach ($comment->reply as $reply)
                  <x-course.comment :comment="$reply"  is_reply />     
               @endforeach

                    
              
            @endforeach

        </div>
            


            <x-breakline /> 
            

            {{-- <x-course.commentinput video_id="{{$lesson->id}}"/> --}}
 
       </div>

      
      

    
 
    <x-course.replyinput/>

    </x-dashboard.mainsection>
</x-layout>