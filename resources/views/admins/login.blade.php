<x-admin.layout>
    <h2 class="my-7 text-3xl font-bold">관리자 로그인</h2>
    <form action="{{route('login.admin')}}" method="post">
        @csrf
        <div class="block mb-5">
            <label class="block">아이디</label>
            <input type="text" name="id" value="{{old('admin_id')}}" class="rounded border border-slate-200 w-full">
            @error('admin_id')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>
        <div class="block mb-5">
            <label class="block">비밀번호</label>
            <input type="password" name="password" value="{{old('password')}}" class="rounded border border-slate-200 w-full">
            @error('password')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="rounded bg-slate-900 text-white py-2 px-3 hover:bg-slate-700">로그인</button>
    </form>
</x-admin.layout>
