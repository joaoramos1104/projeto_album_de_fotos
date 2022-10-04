<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Theme;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('visitor');
    }

    public function index()
    {
        $albums = Album::with('themes.hasImages','themes.comments')->get();
        return view('home', compact('albums'));
    }

    public function storyComments(Request $request)
    {
        $comment = new Comment();
        if ($request)
        {
            $comment->comments = $request->input('comment');
            $comment->name_user = $request->input('name_user');
            $comment->theme_id = $request->input('theme_id');
            $comment->save();
            return redirect()->route('home');
        }
        dd($request);
    }

}
