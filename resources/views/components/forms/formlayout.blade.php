@props(['_method' , 'style'])
@php
 if (isset($style)) {
    $default="";
 } else {

    $default = "mt-10 sm:mx-auto sm:w-full sm:max-w-sm" ;
 }

    
@endphp
<div class="{{$default}}">
    <form {{ $attributes(["class"=>"space-y-3"]) }}  >
        @csrf
        @method($_method)
        
        
    {{$slot}}
    </form>
</div>        