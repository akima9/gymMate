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
            <h2 class="my-7 text-3xl font-bold">CMS ADMIN CREATE PAGE</h2>
            <form action="{{route('admins.store')}}" method="post">
                @csrf
                <input type="text" name="admin_name" placeholder="이름" value="{{old('admin_name')}}">
                @error('admin_name')
                    <p>{{$message}}</p>
                @enderror
                <input type="text" name="admin_id" placeholder="아이디" value="{{old('admin_id')}}">
                @error('admin_id')
                    <p>{{$message}}</p>
                @enderror
                <input type="password" name="password" placeholder="비밀번호">
                @error('password')
                    <p>{{$message}}</p>
                @enderror
                <input type="password" name="password_confirmation" placeholder="비밀번호 재입력">
                @error('password_confirmation')
                    <p>{{$message}}</p>
                @enderror
                <input type="submit" value="등록 신청">
            </form>
        </div>
    </body>
</html>
