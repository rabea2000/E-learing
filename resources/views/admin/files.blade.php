<x-layout>
    <x-dashboard.sidebar/>

    <x-dashboard.mainsection>
        <div class=" mt-14">
        
            <div class=" text-center font-bold text-2xl leading-9 tracking-tight text-gray-900 mb-10">
                <p> الملفات </p>
            </div>
            @if (isset($files))
                @foreach ($files as $file)
                <x-filecarde :file="$file" />
                {{-- <a href="files/{{$file->id}}" class=" block font-serif mt-5  font-bold  rtl text-decoration-line: underline" > 
        
                    <div class=" inline-block ml-12 text-decoration-line: underline">  الصف   :  {{$file->classes_id}}   </div>
                    <div class=" inline-block text-decoration-line: underline">اسم الملف  :    {{$file->name}}      </div>
                
                </a>    --}}
                @endforeach
             
                
            @else
                <p>لايوجد ملفات</p>
                
            @endif
   
            
            {{-- <table>
                <x-table.thead :col_names="['name' ,  'data' , 'class']"/>
                @foreach ($files as $file)
                <x-table.row :rows_data="[$file->name , '200' , $file->classes_id]"/>
                    

                @endforeach
                    
            </table> --}}
        
        
        </div>     
    </x-dashboard.mainsection>
        
    


</x-layout>