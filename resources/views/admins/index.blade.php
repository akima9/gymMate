<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GymMate CMS</title>
    </head>
    <body>
        <h1>CMS HOME PAGE</h1>
        <a href="{{route('admins.create')}}">관리자 생성</a>
    </body>
</html>
