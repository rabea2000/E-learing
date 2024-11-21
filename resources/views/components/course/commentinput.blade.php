 @props(['video_id'])



<form  method="POST"
    {{ $attributes->merge([
        'class' => 'fixed bottom-0 left-1/2 transform -translate-x-1/2 duration-1000 z-10 w-full max-w-2xl border border-gray-200 rounded-lg bg-gray-50',
        'method' => 'POST',
    ]) }}>
    @csrf
    @method('POST')

    <div class="px-4 py-2 bg-white rounded-t-lg">
        <x-forms.label>
           تعليق من  <span class=" text-sm text-gray-500">{{Auth::user()->first_name}} </span> 
        </x-forms.label>
        <x-forms.textarea name="body" placeholder="اكتب تعليقك هنا" />
        <x-forms.input-error :messages="$errors->get('body')" class="mt-2" />
        <input type="hidden" name="video_id" value={{$video_id}} >
    </div>
    <div class="h-18 flex-row-reverse px-3 py-2 border-t bg-white" dir="ltr">
        <button type="submit"
            class="items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
            reply
        </button>
        <button type="button"
            class="items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800"
            @click="showCommentModal = false">
            cancel
        </button>
    </div>
</form>