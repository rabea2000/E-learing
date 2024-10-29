

<form method='POST'  id="comment_or_reply_form" > 
  @csrf 
  @method('POST')
    <div class=" hidden  fixed bottom-0 left-1/2 transform -translate-x-1/2 duration-1000 z-10 w-full max-w-2xl     border border-gray-200 rounded-lg bg-gray-50  "  id="replyField">
        <div class="px-4 py-2 bg-white rounded-t-lg ">
            
          <x-forms.textarea label="رد"  name="body" placeholder="اكتب تعليقك هنا"/>
          <input id="hidden_input_form" type="hidden" name="course_id" >
        </div>
        <div class=" h-18 flex-row-reverse  px-3 py-2 border-t bg-white " dir="ltr">
            <button type="submit" class=" items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800">
                reply
            </button>
            <button type="button" class=" items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800" onclick="showreplyfield()">
              cancel
          </button>

        </div>
    </div>
 </form>

