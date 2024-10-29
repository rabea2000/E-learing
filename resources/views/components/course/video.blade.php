
@props(['video_url'])


{{-- <video class="  border border-gray-200 rounded-lg" controls>
    <source src="{{ route('video.stream', ['filename' => basename($video_url ) ]) }}"  type="video/mp4" id="myVideo">
    Your browser does not support the video tag.
  </video> --}}

<video class="  border border-gray-200 rounded-lg" controls controlslist="nodownload"  >
    <source src="{!! $video_url !!}"  type="video/mp4" id="myVideo">
    Your browser does not support the video tag.
  </video>
  
{{-- <video class="  border border-gray-200 rounded-lg" controls controlslist="nodownload" >
    <source src="https://www.youtube.com/watch?v=n__c7xY1ZcI"  type="video/mp4" id="myVideo">
    Your browser does not support the video tag.
  </video>
   --}}
  {{-- <iframe width="560" height="315" 
    src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
    title="YouTube video player" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen>
</iframe> --}}

{{-- <iframe width="866" height="487" src="https://www.youtube.com/embed/n__c7xY1ZcI" title="Caching - Web Development" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}