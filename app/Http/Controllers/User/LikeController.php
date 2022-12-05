<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\like;
use App\Models\Post;

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store (Request $request, Post $post)
    {
        $post->likes()->create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);
        return back();
    }
    // likedby
    public function destroy (Request $request, Post $post)
    {
        $post->likes()->where('user_id', auth()->id())->delete();
        return back();
    }


}