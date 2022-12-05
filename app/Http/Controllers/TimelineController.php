<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard', [

            // count comments and likes of post
            // show all posts with little query
            'posts' => Post::withCount(['comments', 'likes'])->with('user')->latest()->paginate(10),
            // 'posts' => Post::withCount(['comments', 'likes'])->latest()->get(),

            // 'posts' => Post::with('user')->withCount('comments', 'likes')
            //     ->latest()
            //     ->paginate(5)


        ]);

        // count the number of comments on each post

    }
}