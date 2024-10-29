
<x-layout>
      <x-dashboard.sidebar/>
 
     <x-dashboard.mainsection>

     
          <x-dashboard.adminpanle :info="$info"  :access_denied="$access_denied"/>
     </x-dashboard.mainsection> 




</x-layout>