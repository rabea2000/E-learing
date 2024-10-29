
@props(['video_id'])
<x-forms.formlayout _method="post" style="true" method="post" action="/comment/upload"  >
    <div class="w-full mt-4 border border-gray-200 rounded-lg bg-gray-50  ">
        <div class="px-4 py-2 bg-white rounded-t-lg ">
           
            <x-forms.textarea label="تعليق" name="body" placeholder="اكتب تعليقك هنا "/>
            <input type="hidden" name="course_id" value="{{$video_id}}">

            {{-- <textarea id="comment"  rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0  focus:ring-0 " placeholder="Write a comment..." required ></textarea> --}}
        </div>
        <div class=" flex-row-reverse  px-3 py-2 border-t " dir="ltr">
            <button type="submit" class=" items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800">
                Post comment
            </button>

        </div>
    </div>
 </x-forms.formlayout >
 {{-- <p class="ms-auto text-xs text-gray-500 ">Remember, contributions to this topic should follow our <a href="#" class="text-blue-600  hover:underline">Community Guidelines</a>.</p> --}}
 