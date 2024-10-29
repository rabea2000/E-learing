



<div class=" shadow-2xl max-w-xl  mx-auto rounded-md  my-10 py-5 max-sm:mx-4">
        <div class=" text-center font-bold text-2xl leading-9 tracking-tight text-gray-900 mb-10">
            <p>إنشاء حساب  </p>
        </div>

    

        <form  method="post" action="/register"  enctype="multipart/form-data"  class=" space-y-6 mx-6">
            @csrf
            @method("POST")

            <div>
                <x-forms.label for="first_name" value="الاسم"/>
                <x-forms.input name="first_name"  type="input"  required/>
            </div>

            <div>
                <x-forms.label for="last_name" value="الكنية"/>
                <x-forms.input name="last_name"  type="input" /> 
            </div>                                                                       

            <div>
                <x-forms.label for="user_name" value="اسم  المستخدم" />
                <x-forms.input name="user_name"  type="input" required /> 
            </div>
        

            <div>
                <x-forms.label for="email" value="عنوان البريد الالكتروني"/>
                <x-forms.input name="email"  type="email"  required /> 
            </div>

            <div>
                <x-forms.label for="password" value="كلمة السر "/>
                <x-forms.input name="password"  type="password" required /> 
            </div> 

            <div>
                <x-forms.label for="password_confirmation" value=" تأكيد كلمة السر  "/>
                <x-forms.input name="password_confirmation" type="password" required /> 
            </div>

            <div>
                <x-forms.selectinput name="class"/>
            </div>

            <div>
                <x-forms.label for="img_url" value=" تعيين صور لحسابك في حال أردت"/>
                <x-forms.input name="img_url" type="file"  /> 
            </div>

            <div >
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">تسجيل</button>
            </div>
        </form>

</div>

<div>
    erdsfgs
</div>

    

