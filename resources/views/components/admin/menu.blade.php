<div class="bg-slate-900 text-white p-2">
    <a href="{{route('admins.index')}}" class="p-2 hover:text-orange-200">관리자 목록</a>
    <a href="{{route('admins.create')}}" class="p-2 hover:text-orange-200">관리자 생성</a>
    @auth('admin')
        <a href="{{route('admins.logout')}}" class="p-2 hover:text-orange-200">로그아웃</a>
    @else
        <a href="{{route('admins.login')}}" class="p-2 hover:text-orange-200">로그인</a>
    @endauth
</div>