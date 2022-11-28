<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class EditPostController extends Controller
{
    public function __invoke(Request $request, Post $post)
{
    $this->authorize('update', $post);
    return view('post.edit', [
        'post' => $post
    ]);

}

}