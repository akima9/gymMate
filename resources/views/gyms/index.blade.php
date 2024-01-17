<x-admin.layout>
    <h2 class="my-7 text-3xl font-bold">GYM 목록</h2>
    <table class="table-auto border-collapse border border-slate-400 w-full text-center">
        <thead class="bg-slate-700 text-white">
            <tr>
                <th class="border py-2 border-slate-900">번호</th>
                <th class="border py-2 border-slate-900">이름</th>
                <th class="border py-2 border-slate-900">주소</th>
                <th class="border py-2 border-slate-900">생성일자</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gyms as $gym)
                <tr>
                    <td class="border py-2 border-slate-900">{{$loop->iteration}}</td>
                    <td class="border py-2 border-slate-900">
                        <a href={{route('gyms.edit', $gym->ulid)}} class="hover:text-slate-500">{{$gym->name}}</a>
                    </td>
                    <td class="border py-2 border-slate-900">{{$gym->address}}</td>
                    <td class="border py-2 border-slate-900">{{$gym->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin.layout>