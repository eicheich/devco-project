<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdatePostController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->only('body'));
        session()->flash('success', 'Post updated successfully');
        return redirect()->route('post.show', $post);
    }
}