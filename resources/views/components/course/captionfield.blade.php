@props(['value'])
<div class="flex  justify-center items-center  h-12  rounded-lg text-base font-medium ">  {{$slot}}
        <br  class="max-sm:hidden"> {{$value}}</div>