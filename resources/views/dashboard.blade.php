<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DevCo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 bg-white border-b border-gray-200">
                    <form action="{{ route('post.store')}}" method="POST" >
                        @csrf
                        <textarea name="body" id="body" cols="30" rows="4" class="mb-8 bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>
                        @error('body')
                            <div class="text-red-500 text-sm mt-2">
                                {{$message}}
                            </div>
                        @enderror
                            <button type="submit" value="Post" class="bg-green-500 text-white px-10 py-2 rounded font-medium">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- foreach card post with dropdown menu --}}
    @foreach ($posts as $post)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-10 bg-white border-b border-gray-200">
                        <div class="flex justify-between">
                            <div class="flex">
                                <img src="https://i.pravatar.cc/150?img={{$post->user->id}}" alt="" class="w-10 h-10 rounded-full">
                                <div class="ml-4">
                                    <h3 class="font-bold text-lg">{{$post->user->name}}</h3>
                                    <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="ml-4">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4 6a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm2 0v8h8V6H6z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            @if ($post->user_id == Auth::user()->id)
                                                <form action="{{ route('post.edit', $post->id)}}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Edit</button>
                                                </form>
                                                <form action="{{ route('post.destroy', $post->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Delete</button>
                                                </form>
                                            @endif
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-600">{{$post->body}}</p>
                    </div>
                    <div class="card-actions justify-end mb-4">
                        <a href="{{ route('post.show', $post) }}" class="btn btn-ghost btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 32 32"><path fill="#231F20" d="M25.784 21.017A10.992 10.992 0 0 0 27 16c0-6.065-4.935-11-11-11S5 9.935 5 16s4.935 11 11 11c1.742 0 3.468-.419 5.018-1.215l4.74 1.185a.996.996 0 0 0 .949-.263 1 1 0 0 0 .263-.95l-1.186-4.74zm-2.033.11.874 3.498-3.498-.875a1.006 1.006 0 0 0-.731.098A8.99 8.99 0 0 1 16 25c-4.963 0-9-4.038-9-9s4.037-9 9-9 9 4.038 9 9a8.997 8.997 0 0 1-1.151 4.395.995.995 0 0 0-.098.732z"/></svg>
                        {{$post->comments_count}}
                         </a>
                         {{-- jika post likedby maka post akan di like --}}
                        @if ($post->likedBy(Auth::user()))
                            <form action="{{ route('post.unlike', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-ghost btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M23 10a2 2 0 0 0-2-2h-6.32l.96-4.57c.02-.1.03-.21.03-.32c0-.41-.17-.79-.44-1.06L14.17 1L7.59 7.58C7.22 7.95 7 8.45 7 9v10a2 2 0 0 0 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2M1 21h4V9H1v12Z"/></svg>
                                    {{$post->likes_count}}
                                </button>
                            </form>
                        @else   
                            <form action="{{ route('post.like', $post)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-ghost btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M5 9v12H1V9h4m4 12a2 2 0 0 1-2-2V9c0-.55.22-1.05.59-1.41L14.17 1l1.06 1.06c.27.27.44.64.44 1.05l-.03.32L14.69 8H21a2 2 0 0 1 2 2v2c0 .26-.05.5-.14.73l-3.02 7.05C19.54 20.5 18.83 21 18 21H9m0-2h9.03L21 12v-2h-8.79l1.13-5.32L9 9.03V19Z"/></svg>
                                    {{$post->likes_count}}
                                </button>
                            </form>
                        @endif



                </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
