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
                        <textarea name="body" class="w-full textarea textarea @error('body') textarea-error @enderror " placeholder="Body">{{old('body')}}</textarea>
                        @error('body')
                            <div class="text-red-500 text-sm mt-2">
                                {{$message}}
                            </div>
                        @enderror

                        <input type="submit" value="Post" class="btn btn-secondary btn-sm mt-2 alignment">
                    </form>
                </div>
            </div>
            @foreach ($posts as $post)
            <div class="card w-full bg-base-100 shadow-xl my-4">
                <div class="card-body">
                    <h3 class="card-title">{{$post->user->name}} .<p class="text-gray-300">{{$post->created_at->diffForHumans() }}</p> </h3>
                        <p>{{$post->body}}</p>
            </div>
            <div class="card-actions justify-end mb-4">
                {{-- button comment --}}
                {{-- <a href="{{ route('post.show', $post) }}" class="btn btn-ghost btn-sm mx-4" id="commentBtn" >Comment ({{$post->comments()->count()}})</a> --}}
                <a href="{{ route('post.show', $post) }}" class="btn btn-ghost btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 32 32"><path fill="#231F20" d="M25.784 21.017A10.992 10.992 0 0 0 27 16c0-6.065-4.935-11-11-11S5 9.935 5 16s4.935 11 11 11c1.742 0 3.468-.419 5.018-1.215l4.74 1.185a.996.996 0 0 0 .949-.263 1 1 0 0 0 .263-.95l-1.186-4.74zm-2.033.11.874 3.498-3.498-.875a1.006 1.006 0 0 0-.731.098A8.99 8.99 0 0 1 16 25c-4.963 0-9-4.038-9-9s4.037-9 9-9 9 4.038 9 9a8.997 8.997 0 0 1-1.151 4.395.995.995 0 0 0-.098.732z"/></svg>
                    {{$post->comments_count}}

                </a>
                <a href="{{ route('post.show', $post) }}" class="btn btn-ghost btn-sm">
                    <svg class="h-6 w-6"  viewBox="0 0 44 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 2C6.925 2 2 6.925 2 13C2 24 15 34 22 36.326C29 34 42 24 42 13C42 6.925 37.075 2 31 2C27.28 2 23.99 3.847 22 6.674C20.9857 5.2292 19.6382 4.05009 18.0715 3.23649C16.5049 2.42288 14.7653 1.99875 13 2Z" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="{{ route('post.show', $post) }}" class="btn btn-ghost btn-sm mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7"  preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186a2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185a2.25 2.25 0 0 0-3.933 2.185Z"/></svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
