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
            <h2 class="my-7 text-3xl font-bold">CMS ADMIN EDIT PAGE</h2>
            <form action={{route('admins.update', $admin->ulid)}} method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="admin_name" placeholder="이름" value="{{$admin->name}}" class="rounded border border-slate-200">
                @error('admin_name')
                    <p>{{$message}}</p>
                @enderror
                <input type="text" name="admin_id" placeholder="아이디" value="{{$admin->id}}" class="rounded border border-slate-200">
                @error('admin_id')
                    <p>{{$message}}</p>
                @enderror
                <input type="password" name="password" placeholder="비밀번호" class="rounded border border-slate-200">
                @error('password')
                    <p>{{$message}}</p>
                @enderror
                <input type="password" name="password_confirmation" placeholder="비밀번호 재입력" class="rounded border border-slate-200">
                @error('password_confirmation')
                    <p>{{$message}}</p>
                @enderror
                <input type="radio" name="level" value="sub" @if ($admin->level === 'sub')
                    checked
                @endif>sub
                <input type="radio" name="level" value="main" @if ($admin->level === 'main')
                    checked
                @endif>main
                <input type="radio" name="status" value="active" @if ($admin->status === 'active')
                    checked
                @endif>active
                <input type="radio" name="status" value="inactive" @if ($admin->status === 'inactive')
                    checked
                @endif>inactive
                <button type="submit" class="rounded bg-slate-900 text-white py-2 px-3 hover:bg-slate-700">수정하기</button>
            </form>
        </div>
    </body>
</html>
