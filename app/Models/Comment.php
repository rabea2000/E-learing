<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function video(){

        return $this->belongsTo(video::class) ; 
    }

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function reply(){

        return $this->hasMany(reply::class) ; 
    }
}


// <x-layout x-data="{ replyField: null }"> <!-- Root element with x-data -->
//     <x-course.course-side-bar :videos="$videos" />
//     <x-dashboard.mainsection class="lg:mr-80">
//         <div class="mx-5 h-auto w-11/12 max-w-5xl">
//             <x-course.video video_url="{{ $signe_url }}" />
//             <x-course.videocaption :lesson="$lesson" />

//             <!-- Button to set replyField in Alpine.js -->
//             <button type="button"
//                 class="my-6 w-full h-20 rounded-lg border border-gray-500 bg-gray-100 text-right p-4 hover:bg-gray-300"
//                 @click="replyField = {text: 'تعليق على الفيديو', url: '/comment/upload', inputName: 'video_id', id: '{{ $lesson->id }}'}">
//                 اكتب تعليق.....
//             </button>

//             <x-breakline />

//             <div class="space-y-6 mt-3">
//                 @foreach ($lesson->comment as $comment)
//                     <x-course.comment :comment="$comment" />

//                     <!-- Nested replies for each comment -->
//                     @foreach ($comment->reply as $reply)
//                         <x-course.comment :comment="$reply" is_reply />
//                     @endforeach
//                 @endforeach
//             </div>

//             <x-breakline />
//         </div>

//         <!-- Reply Input Section, only shown when replyField is not null -->
//         <template x-if="replyField !== null">
//             <x-course.replyinput 
//                 x-bind:text="replyField ? replyField.text : ''" 
//                 x-bind:url="replyField ? replyField.url : ''" 
//                 x-bind:inputName="replyField ? replyField.inputName : ''" 
//                 x-bind:id="replyField ? replyField.id : ''" />
//         </template>
//     </x-dashboard.mainsection>
// </x-layout>




// @props(['comment', 'is_reply' => false])

// @php
//     $name = $comment->user->full_name;
//     $date = $comment->created_at ? $comment->created_at->format('h-m-s Y-m-d') : "";
//     $body = $comment->body;
//     $comment_id = $comment->id;
//     $form_action = '/comment/' . $comment_id;
//     $input_name = 'comment_id';
//     $class = "p-6 text-base bg-white rounded-lg hover:bg-gray-200";

//     if ($is_reply) {
//         $class = "p-6 mb-3 mr-6 lg:mr-12 text-base bg-white rounded-lg hover:bg-gray-200";
//         $form_action = '/reply/' . $comment_id;
//         $input_name = 'reply_id';
//     }
// @endphp

// <article class="{{ $class }}" x-data="{ dropdownOpen: false }">
//     <footer class="flex justify-between items-center mb-2">
//         <div class="flex items-center">
//             <p class="inline-flex items-center ml-3 text-sm text-gray-900 font-semibold">
//                 <img class="ml-2 w-6 h-6 rounded-full" src="{{ asset('storage/' . $comment->user->img_url) }}" alt="{{ $name }}">
//                 {{ $name }}
//             </p>
//             <p class="text-sm text-gray-600">{{ $date }}</p>
//         </div>

//         <div class="relative">
//             <button @click="dropdownOpen = !dropdownOpen"
//                 class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-white rounded-lg hover:bg-gray-100">
//                 <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 3">
//                     <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
//                 </svg>
//             </button>

//             <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
//                 class="absolute left-0 z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow">
//                 <ul class="py-1 text-sm text-gray-700">
//                     <li><a href="#" class="block py-2 px-4 hover:bg-gray-100">Edit</a></li>
//                     <li>
//                         <form action="{{ $form_action }}" method="POST">
//                             @csrf
//                             @method('DELETE')
//                             <button type="submit" class="block py-2 px-4 hover:bg-gray-100">Remove</button>
//                         </form>
//                     </li>
//                     <li><a href="#" class="block py-2 px-4 hover:bg-gray-100">Report</a></li>
//                 </ul>
//             </div>
//         </div>
//     </footer>

//     <p class="text-gray-500">{{ $body }}</p>

//     <div class="flex items-center mt-4 space-x-4" dir="ltr">
//         @if (!$is_reply)
//             <button type="button"
//                 class="flex items-center py-2.5 px-4 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800"
//                 @click="$dispatch('reply-field', { text: '{{ $name }}', url: '/reply/upload', inputName: '{{ $input_name }}', id: '{{ $comment_id }}' })">
//                 <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
//                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
//                         d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
//                 </svg>
//                 رد
//             </button>
//         @endif
//     </div>
// </article>




