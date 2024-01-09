<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mateboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <a
                        class="bg-indigo-500 hover:bg-indigo-600 text-white py-1 px-2 rounded"
                        href="{{route('metaboard.create')}}"
                    >
                        모집하기
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
