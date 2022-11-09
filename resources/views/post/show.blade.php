<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post Detals
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" w-full bg-base-100 shadow-xl rounded-lg">
                <div class="card-body">
                    <h3 class="card-title">{{$post->user->name}} - <span class="text-gray-400">{{$post->created_at->diffForHumans() }}</span> </h3>
                        <p>{{$post->body}}</p>
            </div>
        </div>
    </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            Comments
        </h2>
    </div>
    <div class="comment mb-2">
        @foreach( $post->comments as $comment )
                     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4">
                         <div class=" w-full bg-base-200 l rounded-lg">
                             <div class="card-body">
                                <h3 class="card-title">{{$comment->user->name }} - <span class="text-gray-400">{{$comment->created_at->diffForHumans() }}</span>
                                    <form action="{{ route('post.comment.destroy', [$comment->post, $comment]) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="Delete" class="btn btn-error">Delete</button>
                                    </form>

                                </h3>
                                    <p>{{$comment->body}}</p>
                                    <a href=""></a>
                                </div>
                            </div>
                            </div>
                    @endforeach

    </div>
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card border-b border-gray-200">
                    <div class="card-body">
                        <form action="{{ route('post.comment.store', $post )}}" method="POST" >
                        @csrf
                        <textarea name="body" class="w-full textarea textarea @error('body') textarea-error @enderror " placeholder="Leave a comment">{{old('body')}}</textarea>
                        @error('body')
                            <div class="text-red-500 text-sm mt-2">
                                {{$message}}
                            </div>
                        @enderror

                        <input type="submit" value="Post" class="btn btn-secondary btn-sm mt-2 alignment">
                    </form>
                    </div>
                </div>
</x-app-layout>
