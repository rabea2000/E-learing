
@props(['paid'])
<div class=" shadow-lg   bg-white rounded-lg p-6  ">
    <div class=" font-bold text-lg my-3">   نوعية الحساب :    <span class=" mx-4 text-green-500 font-normal"> حساب مدفوع </span></div>
    <div class=" font-bold text-lg  my-3">تفاصيل الحساب     :</div>
    <div class="space-y-4">
        <!-- Container for the first row of information -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- التاريخ and its data -->
            <div class="flex flex-row md:flex-col">
                <span class="font-bold ">التاريخ:</span>
                <span class=" max-md:mr-4">{{ ($paid->created_at)}}</span>
            </div>
            
            <!-- معلومات الدفع and its data -->
            <div class="flex flex-row md:flex-col">
                <span class="font-bold">معلومات الدفع :</span>
                <span  class="max-md:mr-4" >{{$paid->information}}</span>
            </div>
            
            <!-- القيمة and its data -->
            <div class="flex flex-row md:flex-col">
                <span class="font-bold">القيمة:</span>
                <span class="max-md:mr-4" > {{$paid->amount}} د.أ</span>
            </div>
        </div>
    </div>
    

  </div>
{{-- 
  <form action="/" method="POST">
    @csrf
    @method("POST")
    <div>
       
        <x-forms.input id="user_id" name="user_id" type="text" class="mt-1 block w-full"  required autofocus  hidden />
        <x-forms.input-error class="mt-2" :messages="$errors->get('user_id')" />
    </div>
    <div>
        <x-forms.label for="information"   value="تفاصيل عملية الشراء"/>
        <x-forms.input id="information" name="information" type="text" class="mt-1 block w-full"   autofocus  hidden />
        <x-forms.input-error class="mt-2" :messages="$errors->get('information')" />
    </div>
    <div>
        <x-forms.label for="amount"   value="القيمة "/>
        <x-forms.input id="amount" name="amount" type="text" class="mt-1 block w-full"  required  autofocus  hidden />
        <x-forms.input-error class="mt-2" :messages="$errors->get('amount')" />
    </div>


</form> --}}