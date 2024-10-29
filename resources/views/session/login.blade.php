<x-layout>
    <x-nav/>
  

  <div class=" shadow-2xl max-w-xl  mx-auto rounded-md  my-10 py-8 max-sm:mx-4">
    <div class=" text-center font-bold text-2xl leading-9 tracking-tight text-gray-900 mb-10">
        <p>تسجيل الدخول </p>
    </div>



    <form  method="post" action="/login"  class=" space-y-6 mx-6">
        @csrf
        @method("POST")

        <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />

        <div>
            <x-forms.label for="user_name" value="اسم  المستخدم" />
            <x-forms.input name="user_name"  type="input" required /> 
        </div>
  

        <div>
            <x-forms.label for="password" value="كلمة السر "/>
            <x-forms.input name="password"  type="password" required /> 
        </div> 

        
          <p> ليس لديك حساب؟  <a href="/register" class=" text-blue-500 hover:underline text-sm"> قم بإنشاء حساب </a></p>




        <div >
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">تسجيل</button>
        </div>

        <a href="/forgot-password" class=" block text-blue-500 hover:underline text-sm  mt-4 mr-2"> هل نسيت كلمة السر ؟</a>
   
    </form>


</div>



</x-layout>




