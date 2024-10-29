@props(['url' , 'name'])

<a href="{{$url}}" class="<?= request()->is($url) ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">{{$name}}</a>
