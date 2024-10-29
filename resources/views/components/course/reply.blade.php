@props(['reply'])

@php
    $first_name =  $reply->user->first_name ;
    $last_name= $reply->user->last_name ;
    $name =  $first_name ." " .$last_name ; 
    $date = $reply->created_at->format('h-m-s Y-m-d ') ;
    $body  = $reply->body;

@endphp
{{-- <div class="flex items-start max-w-10/12 mt-5 mr-36 mr" >
    <img class="w-8 h-8 rounded-full mx-2" src="{{ asset("images/". "abd.jpg") }}" alt="Jese image">
    <div class="flex flex-col w-full  leading-1.5 p-4 border-gray-200 bg-gray-200 rounded-e-xl rounded-es-xl hover:bg-gray-300">
       <div class="flex items-center space-x-2 rtl:space-x-reverse">
          <span class="text-sm font-semibold text-gray-900 ">{{ $reply->user->first_name }} {{ $reply->user->last_name }}</span>
          <span class="text-sm font-normal text-gray-500">{{ $reply->created_at->format(' h-m-s Y-m-d')}}</span>
       </div>
       <p class="text-sm font-normal py-2.5 text-gray-900 ">{{ $reply->body}}</p>
 
    </div>

  
 </div> --}}
 <article class="p-6  mb-3 mr-6 lg:mr-12 text-base bg-white rounded-lg " >
    <footer class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center ml-3 text-sm text-gray-900  font-semibold">
              <img class="ml-2 w-6 h-6 rounded-full"
                  src="{{ asset("images/". "abd.jpg") }}"
                  alt="Michael Gough">{{$name}}
            </p>
            <p class="text-sm text-gray-600 ">
              {{$date}}
            </p>
        </div>
  
        <!-- Wrapping the button and dropdown in a relative container -->
        <div class="relative">
            <button id="dropdownComment1Button"
                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500  bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
                type="button">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 3">
                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                </svg>
                
            </button>
            
            <!-- Dropdown menu with updated positioning -->
            <div id="dropdownComment1"
                class="hidden absolute left-0 z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow ">
                <ul class="py-1 text-sm text-gray-700 "
                    aria-labelledby="dropdownMenuIconHorizontalButton">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100">Remove</a>
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
        <button type="button"
            class="flex items-center text-sm text-gray-500 hover:underline  font-medium">
            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
            </svg>
            رد
        </button>
    </div>
  </article>
  
  <!-- JavaScript to handle the dropdown -->
  <script>
    // Select the button and the dropdown menu
    const dropdownButton = document.getElementById('dropdownComment1Button');
    const dropdownMenu = document.getElementById('dropdownComment1');
  
    // Add a click event listener to the button
    dropdownButton.addEventListener('click', function() {
      // Toggle the 'hidden' class to show or hide the dropdown
      dropdownMenu.classList.toggle('hidden');
    });
  
    // Optionally, hide the dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
      if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });
  </script>
  

  @props(['comment' , 'is_reply'])
@php
    $first_name =  $comment->user->first_name ;
    $last_name= $comment->user->last_name ;
    $name =  $first_name ." " .$last_name ; 
    $date = $comment->created_at->format('h-m-s Y-m-d ') ;
    $body  = $comment->body;
    $class = "p-6 text-base bg-white rounded-lg " ; 
    if( isset($is_reply)) {
      $class = "p-6 mb-3 mr-6 lg:mr-12  text-base bg-white rounded-lg" ;
    }

@endphp

<article class='{{$class}}'>
  <footer class="flex justify-between items-center mb-2">
      <div class="flex items-center">
          <p class="inline-flex items-center ml-3 text-sm text-gray-900  font-semibold">
            <img class="ml-2 w-6 h-6 rounded-full"
                src="{{ asset("images/". "abd.jpg") }}"
                alt="Michael Gough">{{$name}}
          </p>
          <p class="text-sm text-gray-600 ">
            {{$date}}
          </p>
      </div>

      <!-- Wrapping the button and dropdown in a relative container -->
      <div class="relative">
          <button id="dropdownComment1Button"
              class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500  bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
              type="button">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                  viewBox="0 0 16 3">
                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
              </svg>
              
          </button>
          
          <!-- Dropdown menu with updated positioning -->
          <div id="dropdownComment1"
              class="hidden absolute left-0 z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow ">
              <ul class="py-1 text-sm text-gray-700 "
                  aria-labelledby="dropdownMenuIconHorizontalButton">
                  <li>
                      <a href="#"
                          class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                  </li>
                  <li>
                      <a href="#"
                          class="block py-2 px-4 hover:bg-gray-100">Remove</a>
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

    <button type="button" id="reply" class=" items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800 " onclick="showreplyfield('{{$name}}','/reply/upload','comment_id','{{$comment->id}}')">
      reply
  </button>
      <button type="button"
          class="flex items-center text-sm text-gray-500 hover:underline  font-medium">
          <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 20 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
          </svg>
          رد
      </button>
  </div>
</article>

<!-- JavaScript to handle the dropdown -->
<script>
  // Select the button and the dropdown menu
  const dropdownButton = document.getElementById('dropdownComment1Button');
  const dropdownMenu = document.getElementById('dropdownComment1');

  // Add a click event listener to the button
  dropdownButton.addEventListener('click', function() {
    // Toggle the 'hidden' class to show or hide the dropdown
    dropdownMenu.classList.toggle('hidden');
  });

  // Optionally, hide the dropdown when clicking outside of it
  document.addEventListener('click', function(event) {
    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
      dropdownMenu.classList.add('hidden');
    }
  });
</script>


