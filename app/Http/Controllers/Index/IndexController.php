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
        return view('app.home', compact('albums'));
    }


    public function showComments($id)
    {
        $theme =  Theme::find($id);
        if ($theme){
            return view('app.comments', compact('theme'));
        }
        return redirect()->route('/');
    }

    public function storyComments(Request $request)
    {

        $this->validate($request, [
                'comment' => ['required', 'string', 'max:255'],
                'name_user' => ['required', 'string', 'max:255'],
                'theme_id' => ['required']
            ],
        );

        $comment = Comment::create([
        'comments' => $request['comment'],
        'name_user' => $request['name_user'],
        'theme_id' => $request['theme_id'],

        ]);
        return $comment->toJson();
        // return redirect()->route('home');
    }

}
