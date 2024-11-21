<x-forms.button :attributes="$attributes->merge([
    'class' => 'group'
])">
    <svg class="me-1 -ms-1 w-5 h-5 group-hover:scale-125  " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
    {{$slot}}
</x-forms.button>
