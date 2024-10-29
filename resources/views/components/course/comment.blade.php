@props(['comment' , 'is_reply'])
@php
   
    $name =   $comment->user->full_name ; 
    $date = isset($comment->created_at) ? $comment->created_at->format('h-m-s Y-m-d ') : "" ;
    $body  = $comment->body;
    $comment_id = $comment->id ; 

    $form_action = '/comment/'.$comment_id; 
    $input_name = 'comment_id';
    $class = "p-6 text-base bg-white rounded-lg hover:bg-gray-200" ; 
    if( isset($is_reply)) {
      $class = "p-6 mb-3 mr-6 lg:mr-12  text-base bg-white rounded-lg hover:bg-gray-200" ;
      $form_action = '/reply/'.$comment_id; 
      $input_name = 'reply_id';

    }
  

@endphp

<article class='{{$class}}'>
  <footer class="flex justify-between items-center mb-2 ">
      <div class="flex items-center">
          <p class="inline-flex items-center ml-3 text-sm text-gray-900  font-semibold">
            <img class="ml-2 w-6 h-6 rounded-full"
                src="{{ asset('storage/'.$comment->user->img_url) }}"
                alt="Michael Gough">{{$name}}
          </p>
          <p class="text-sm text-gray-600 ">
            {{$date}}
          </p>
      </div>

      <!-- Wrapping the button and dropdown in a relative container -->
      <div class="relative">
          <button id="dropdownCommentButton" 
              @if (isset($is_reply))
                    onclick="showdropdownComment('{{$comment->id}}' , 'reply')"               
              @else
                    onclick="showdropdownComment('{{$comment->id}}')"
              @endif
         
             
              class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500  bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
              type="button">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                  viewBox="0 0 16 3">
                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
              </svg>
              
          </button>
          
          <!-- Dropdown menu with updated positioning -->
          @php
          if (isset($is_reply)) {
            $div_id ="dropdownReply".$comment_id ;
          } else {
            $div_id ="dropdownComment".$comment_id ;
          }
                 
          @endphp


          <div id = "{{$div_id}}"
              class="hidden absolute left-0 z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow ">
              <ul class="py-1 text-sm text-gray-700 "
                  aria-labelledby="dropdownMenuIconHorizontalButton">
                  <li>
                      <a href="#"
                          class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                  </li>
                  <li>
                      <form action='{{$form_action}}' method="POST" >
                        @csrf 
                        @method('DELETE')
                          
                          <button type="submit" class="block py-2 px-4 hover:bg-gray-100" >Remove</button>
                          </form>
                  </li>
                  <li>
                      <a href="#"
                          class="block py-2 px-4 hover:bg-gray-100">Report</a>
                  </li>
              </ul>
          </div>
      </div>
  </footer>

  <p class="text-gray-500 ">{{$body}}</p>

  <div class="flex items-center mt-4 space-x-4" dir="ltr">

    @if (!isset($is_reply))
    <button type="button"
      id="reply" 
      class="flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800 "
      onclick="showreplyfield('{{$name}}','/reply/upload', '{{$input_name}}' ,'{{$comment->id}}')">
        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 20 18">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
        </svg>
        رد
   </button>
        
    @endif


  </div>
</article>













