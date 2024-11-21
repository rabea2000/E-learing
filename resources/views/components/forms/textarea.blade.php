
<textarea   {{$attributes->merge(
    ['rows' =>"4"  , 
      'class'=>"block p-2.5 w-full text-sm my-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600   "])
  }}>

{{$slot}}
</textarea>
    