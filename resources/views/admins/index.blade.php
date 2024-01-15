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
            <h2 class="my-7 text-3xl font-bold">CMS ADMIN LIST PAGE</h2>
            <table class="table-auto border-collapse border border-slate-200 w-full text-center">
                <thead>
                    <tr>
                        <th class="border">번호</th>
                        <th class="border">아이디</th>
                        <th class="border">이름</th>
                        <th class="border">등급</th>
                        <th class="border">상태</th>
                        <th class="border">생성일자</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td class="border">{{$loop->iteration}}</td>
                            <td class="border">
                                <a href={{route('admins.edit', ['ulid' => $admin->ulid])}}>{{$admin->id}}</a>
                            </td>
                            <td class="border">{{$admin->name}}</td>
                            <td class="border">{{$admin->level}}</td>
                            <td class="border">{{$admin->status}}</td>
                            <td class="border">{{$admin->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
