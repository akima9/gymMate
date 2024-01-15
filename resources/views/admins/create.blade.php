<x-admin.layout>
    <h2 class="my-7 text-3xl font-bold">관리자 생성</h2>
    <form action="{{route('admins.store')}}" method="post">
        @csrf

        <div class="block mb-5">
            <label class="block">이름</label>
            <input type="text" name="admin_name" value="{{old('admin_name')}}" class="rounded border border-slate-200 w-full">
            @error('admin_name')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>

        <div class="block mb-5">
            <label class="block">아이디</label>
            <input type="text" name="admin_id" value="{{old('admin_id')}}" class="rounded border border-slate-200 w-full">
            @error('admin_id')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>
        
        <div class="block mb-5">
            <label class="block">비밀번호</label>
            <input type="password" name="password" class="rounded border border-slate-200 w-full">
            @error('password')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>
        
        <div class="block mb-5">
            <label class="block">비밀번호 확인</label>
            <input type="password" name="password_confirmation" class="rounded border border-slate-200 w-full">
            @error('password_confirmation')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="rounded bg-slate-900 text-white py-2 px-3 hover:bg-slate-700">등록 신청</button>
    </form>
</x-admin.layout>