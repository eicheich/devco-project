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
            <div class="card-actions justify-end mb-2">
                {{-- button comment --}}
                <a href="{{ route('post.show', $post) }}" class="btn btn-ghost btn-sm mx-4" id="commentBtn" >Comment</a>
                {{-- button like --}}
                <button class="btn btn-ghost btn-sm" id="likeBtn" onclick="">Like</button>
                {{-- button share --}}
                <button class="btn btn-ghost btn-sm mx-4" id="shareBtn" onclick="showShare()">Share</button>

            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
