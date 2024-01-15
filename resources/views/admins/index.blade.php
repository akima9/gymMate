<x-admin.layout>
    <h2 class="my-7 text-3xl font-bold">관리자 목록</h2>
    <table class="table-auto border-collapse border border-slate-400 w-full text-center">
        <thead class="bg-slate-700 text-white">
            <tr>
                <th class="border py-2 border-slate-900">번호</th>
                <th class="border py-2 border-slate-900">아이디</th>
                <th class="border py-2 border-slate-900">이름</th>
                <th class="border py-2 border-slate-900">등급</th>
                <th class="border py-2 border-slate-900">상태</th>
                <th class="border py-2 border-slate-900">생성일자</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td class="border py-2 border-slate-900">{{$loop->iteration}}</td>
                    <td class="border py-2 border-slate-900">
                        <a href={{route('admins.edit', $admin->ulid)}} class="hover:text-slate-500">{{$admin->id}}</a>
                    </td>
                    <td class="border py-2 border-slate-900">{{$admin->name}}</td>
                    <td class="border py-2 border-slate-900">{{$admin->level}}</td>
                    <td class="border py-2 border-slate-900">{{$admin->status}}</td>
                    <td class="border py-2 border-slate-900">{{$admin->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin.layout>