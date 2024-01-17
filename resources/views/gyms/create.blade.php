<x-admin.layout>
    <h2 class="my-7 text-3xl font-bold">GYM 생성</h2>
    <form action="{{route('gyms.store')}}" method="post">
        @csrf

        <div class="block mb-5">
            <label class="block">이름</label>
            <input type="text" name="name" value="{{old('name')}}" class="rounded border border-slate-200 w-full">
            @error('name')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>

        <div class="block mb-5">
            <label class="block">주소</label>
            <input type="text" name="address" value="{{old('address')}}" class="rounded border border-slate-200 w-full">
            @error('address')
                <p class="italic text-sm text-rose-500">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="rounded bg-slate-900 text-white py-2 px-3 hover:bg-slate-700">등록</button>
    </form>
</x-admin.layout>