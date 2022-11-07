<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DevCo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('post.store')}}" method="POST" >
                        @csrf
                        <textarea name="body" class="w-full textarea textarea-warning" placeholder="Body">{{old('body')}}</textarea>
                        <input type="submit" value="Post" class="btn btn-accent btn-sm mt-2 alignment">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
