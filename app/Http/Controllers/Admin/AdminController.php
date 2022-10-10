<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Theme;
use App\Models\Image;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $albums = Album::with('themes.hasImages')->get();
        return view('admin', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function storeAlbum(Request $request)
    {
        if ($request->input('name_album'))
        {
            $album = new Album();
            $album->name = $request->input('name_album');
            $album->save();
            return redirect('admin');
        }
        return redirect('admin');
    }

    public function storeTheme(Request $request)
    {
        $theme = new Theme();

        if ($request->album_id && $request->name && $request->description){
            $theme->album_id = $request->album_id;
            $theme->name_theme = $request->name;
            $theme->description_theme = $request->description;
            $theme->save();

            if ($request->hasFile('photo_url')){
                $image = $this->hasImages($request, 'photo_url');
                $theme->hasImages()->createMany($image);
            }

            return redirect('admin')->with("success","Thema Inserido!");
        }
        return redirect('admin')->with("error","Ocorreu um erro inexperado");
    }

    private function hasImages(Request $request, $imageColum){
        $images = $request->file('photo_url');
        $uploadImages = [];

        foreach ($images as $img){
            $uploadImages[] = [$imageColum => $img->store('url_img')];
        }
        return $uploadImages;
    }

    public function destroyTheme ($id)
    {
        $theme = Theme::with('hasImages')->find($id);
        if (isset($theme))
        {
            foreach ($theme->hasImages as $img)
            {
                Storage::delete($img->photo_url);
            }
            $theme->delete();
            return redirect()->route('admin');
        }
        return redirect()->route('admin');
    }


    public function newImage (Request $request)
    {
        $themeImage = new Image();
        if ($request->input('theme_id') AND $request->file('photo'))
        {
            $themeImage->theme_id = $request->input('theme_id');
            $themeImage->photo_url = $request->file('photo')->store('url_img');
            $themeImage->save();
            return redirect()->route('admin');
        }
        return redirect()->route('admin');
    }


    public function updateTheme(Request $request, $id)
    {
        if (isset($request))
        {
            $theme = Theme::find($id);
            $theme->name_theme = $request->input('name');
            $theme->description_theme = $request->input('description');
            $theme->save();

            return redirect()->route('admin');
        }
    }

    public function storePhoto(Request $request)
    {
        //
    }

    public function destroyPhoto ($id)
    {
        $photo = Image::find($id);
        if (isset($photo))
        {
            $photo_url = $photo->photo_url;
            Storage::delete([$photo_url]);
            $photo->delete();
            return redirect()->route('admin');
        }
        return redirect()->route('admin');
    }

    public function destroyComment ($id)
    {
        $comment = Comment::find($id);
        if (isset($comment))
        {
            $comment->delete();
            return redirect()->route('admin');
        }
        return redirect()->route('admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
