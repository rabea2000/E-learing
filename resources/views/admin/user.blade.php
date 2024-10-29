
<x-layout>
    <x-dashboard.sidebar/>
    <x-dashboard.mainsection > 

       
        <div class="container mx-auto p-6 space-y-6 mb-10">
    
            <!-- User Info Card -->
            <div class="bg-white shadow-lg rounded-lg p-6">
              <div class="flex items-center ">
                <x-dashboard.users.placeholder-image :name="$user->place_holder"/>
                <div class=" mx-10">
                  <h2 class="text-2xl font-bold text-gray-800">{{$user->full_name}}</h2>
                  <p class="text-gray-600">{{$user->email}}</p>
                  <p class="mt-2 text-sm">
                    <span class="text-green-500 font-semibold">Online</span> <!-- Online Status -->
                  </p>
                  <p class="mt-2 text-gray-600">الصف  <span class="font-semibold">{{$user->classes_id}}</span></p>
                </div>
              </div>
            </div>
        
            <!-- Devices & Access Section Card -->
            <div class="bg-white shadow-lg rounded-lg p-6">
              <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                
                <!-- Allowed Devices -->
                <div>
                  <h3 class="text-xl font-bold text-gray-800 mb-4">الأجهزة المسموح بالدخول منها </h3>
                  <ul class="space-y-3">
                    @foreach ($user->allowed_devices as $device)
                          <x-dashboard.users.allowed-device :device="$device" />
                    @endforeach
                    

                    <!-- Add more devices as needed -->
                  </ul>
                </div>
        
                <!-- Access Denied Section -->
                <div>
                  <h3 class="text-xl font-bold text-gray-800 mb-4">محاولات  الدخول من أجهزة  غير المسوح  بالدخول منها </h3>
                  <ul class="space-y-3">
                    @foreach ($user->access_denied as $device)
                    <x-dashboard.users.allowed-device :device="$device" deny />
                      @endforeach
                    
                  </ul>
                </div>
        
              </div>
            </div>

            @if (isset($user->paid_user))
                <x-dashboard.users.paid-card :paid="$user->paid_user" />
            @else
                <x-dashboard.users.paid-form :user="$user"/>
            @endif

            

            
  

           
          </div>

   





    </x-dashboard.mainsection>


</x-layout>