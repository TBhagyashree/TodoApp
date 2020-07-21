<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    @livewireStyles
    <title>Todos</title>
</head>
<body>
<div class="text-center font-weight-bold flex justify-center pt-10 ">
    <div class=" width-1/3 px-8 border border-gray-600 rounded pt-5 pb-0">
        @yield('content')
    </div>
</div>
 @livewireScripts
</body>
</html>

