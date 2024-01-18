<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GymMate</title>
        @vite('resources/css/app.css')
    </head>
    <body class="h-full">
        <div class="min-h-full">
            <x-client.menu/>
            {{$slot}}
        </div>
    </body>
</html>
