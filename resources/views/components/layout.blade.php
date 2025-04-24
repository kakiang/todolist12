<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes tâches</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
   <div class="container mix-auto p-4 max-w-4xl">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
        {{ $slot  }}
   </div> 
</body>
</html>