<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GymMate CMS</title>
    </head>
    <body>
        <h1>CMS ADMIN CREATE PAGE</h1>
        <a href="{{route('admins.create')}}">관리자 생성</a>
        <div class="container">
            <h2>CONTAINER</h2>
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
