<x-admin.layout>
    <h2 class="my-7 text-3xl font-bold">관리자 수정</h2>
    <form action={{route('admins.update', $admin->ulid)}} method="POST">
        @csrf
        @method('PUT')

        <div class="block mb-5">
            <label class="block">이름</label>
            <input type="text" name="admin_name" value="{{$admin->name}}" class="rounded border border-slate-200 w-full">
            @error('admin_name')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>

        <div class="block mb-5">
            <label class="block">아이디</label>
            <input type="text" name="admin_id" value="{{$admin->id}}" class="rounded border border-slate-200 w-full">
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

        <div class="block mb-5">
            <label class="block">관리자 등급</label>
            <label>
                <input type="radio" name="level" value="sub" @checked($admin->level === 'sub')>
                <span>sub</span>
            </label>
            <label>
                <input type="radio" name="level" value="main" @checked($admin->level === 'main')>
                <span>main</span>
            </label>
        </div>
        
        <div class="block mb-5">
            <label class="block">계정 상태</label>
            <label>
                <input type="radio" name="status" value="active" @checked($admin->status === 'active')>
                <span>active</span>
            </label>
            <label>
                <input type="radio" name="status" value="inactive" @checked($admin->status === 'inactive')>
                <span>inactive</span>
            </label>
        </div>
        
        <button type="submit" class="rounded bg-slate-900 text-white py-2 px-3 hover:bg-slate-700">수정하기</button>
    </form>
</x-admin.layout>