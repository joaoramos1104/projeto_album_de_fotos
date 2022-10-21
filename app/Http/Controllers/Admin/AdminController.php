<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Theme;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $albums = Album::with('themes.hasImages')->get();
        return view('admin', compact('albums'));
    }


    public function getVisitorUser()
    {
        return User::all()->toJson();
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
    public function destroyAlbum($id)
    {
        $album = Album::find($id);
        if (isset($album))
        {
            $album->delete();
            return redirect()->route('admin');
        }
        return redirect()->route('admin');
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


    public function storePhoto (Request $request)
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


    public function destroyPhoto ($id)
    {
        $image = Image::find($id);
        if (isset($image))
        {
            $photo_url = $image->photo_url;
            Storage::delete([$photo_url]);
            $image->delete();
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $data)
    {
        $validated = $this->validate($data, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed']
        ],
    );


            $data['admin_user'] = 0;
            $data['visitor_user'] = 0;
            if ($data->input('admin_user') == 'on'){
                $data['admin_user'] = 1;
            }
            if ($data->input('visitor_user') == 'on'){
                $data['visitor_user'] = 1;
            }

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone_visitor_user'],
                'active' => $data['status_visitor_user'],
                'admin' => $data['admin_user'],
                'visitor' => $data['visitor_user'],
                'password' => Hash::make($data['password']),
            ]);
    }

}
