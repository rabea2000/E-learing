<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css' ,'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="filepond.css" rel="stylesheet" /> --}}
    {{-- <script src="https://cdn.tailwindcss.com?plugins=forms"></script> --}}
    <title>E-learing</title>
</head>
<body  >
  

  {{$slot}}
    {{-- <script src="filepond.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> --}}
    </body>
</html>