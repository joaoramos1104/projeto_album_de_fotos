<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Album;
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
        $albums = Album::with('themes.hasImages')->get();
        return view('home', compact('albums'));
    }

}
