<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GymMate CMS</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="bg-slate-900 text-white p-2">
            <a href="{{route('admins.index')}}" class="p-2 hover:text-orange-200">관리자 목록</a>
            <a href="{{route('admins.create')}}" class="p-2 hover:text-orange-200">관리자 생성</a>
        </div>
        <div class="container mx-auto">
            
        </div>
    </body>
</html>
