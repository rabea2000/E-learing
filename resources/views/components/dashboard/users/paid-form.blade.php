<section>
            <!-- Button to Open the Modal -->
            <div class="flex justify-center items-center ">
                <button id="openModalBtn" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                  تحويل لحساب مدفوع 
                </button>
              </div>
              @if ( $errors->get('amount') == null  ||  $errors->get('user') == null ||  $errors->get('information') == null   )
                    <div id="myModal" class="fixed inset-0  hidden  bg-gray-900 bg-opacity-50 flex items-center justify-center"> 
            
              @else
                   <div id="myModal" class="fixed inset-0  flex  bg-gray-900 bg-opacity-50   items-center justify-center">
              @endif
              <!-- Modal Background -->
                
                <!-- Modal Content -->
                <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/3">
                  <div class="flex justify-between items-center p-4 border-b">
                    <h2 class="text-xl font-semibold">Fill out the form</h2>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
                  </div>
                  <div class="p-6">

                      
  <form action="/paid_user/{{$user->id}}" method="POST" class=" space-y-4">
    @csrf
    @method("POST")

    <div>
      <x-forms.input-error class="mt-2" :messages="$errors->get('user')" />
    </div>
    <div>
        <x-forms.label for="information"   value="تفاصيل عملية الدفع "/>
        <x-forms.textarea id="information"  name=information  placeholder="اي تفاصيل عن عملية الدفع  (طريقة الدفع ,ملاحظات أخرى ......)" required   />
        <x-forms.input-error class="mt-2" :messages="$errors->get('information')" />
    </div>
    <div>
        <x-forms.label for="amount"   value="القيمة "/>
     
        <x-forms.input id="amount" name="amount" type="number" class="mt-2 block w-full"  required  autofocus  hidden />
        <x-forms.input-error class="mt-2" :messages="$errors->get('amount')" />
    </div>

    <div class=" mt-4" dir="ltr">
        <x-forms.button class=" bg-blue-500 hover:bg-blue-700"> تسجيل </x-forms.button>
    </div>

</form>



               
                  </div>
                </div>
              </div>
            


</section>

<script>
    // Get modal element
    const modal = document.getElementById('myModal');
    
    // Get open modal button
    const openModalBtn = document.getElementById('openModalBtn');
    
    // Get close modal button
    const closeModalBtn = document.getElementById('closeModalBtn');
    
    // Listen for open click
    openModalBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
    });
    
    // Listen for close click
    closeModalBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });
    
    // Close modal when clicking outside of the modal content
    window.addEventListener('click', (e) => {
      if (e.target == modal) {
        modal.classList.add('hidden');
      }
    });
  </script>
