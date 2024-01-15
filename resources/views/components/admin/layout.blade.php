<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GymMate CMS</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <x-admin.menu/>
        <div class="container mx-auto">
            {{ $slot }}
        </div>
    </body>
</html>
