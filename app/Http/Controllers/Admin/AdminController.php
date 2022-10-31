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
use function MongoDB\BSON\toJSON;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $albums = Album::with('themes.hasImages')->get();
        return view('admin.admin', compact('albums'));
    }


    public function getVisitorsUsers()
    {
        return User::all()->toJson();
    }

    public function editVisitorUser($id)
    {
        $data =  User::findOrFail($id);
        if ($data){
            return view('admin.edit_visitor_user', compact('data'));
        }
        return redirect()->route('visitors_users');
    }

    public function updateVisitorUser(Request $request, $id)
    {
        $visitor_user = User::find($id);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string']
        ]);
            if (isset($request->password)){
                $this->validate($request, [
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                $visitor_user->password = Hash::make($request->input('password'));
            }

            if ($request->input('admin') == 'on'){
                $request['admin'] = 1;
            } else {
                $request['admin'] = 0;
            }
            if ($request->input('visitor') == 'on'){
                $request['visitor'] = 1;
            } else {
                $request['visitor'] = 0;
            }
            if ($request->input('active') == 'on'){
                $request['active'] = 1;
            } else {
                $request['active'] = 0;
            }

            $visitor_user->name = $request['name'];
            $visitor_user->email = $request['email'];
            $visitor_user->phone = $request['phone'];
            $visitor_user->active = $request['active'];
            $visitor_user->admin = $request['admin'];
            $visitor_user->visitor = $request['visitor'];
            $visitor_user->save();
        return $visitor_user->toJson();

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
        $request->validate([
            'photo_url.*' => ['required','image','mimes:jpg,png,jpeg,gif,svg'],
            'name_theme.*' => ['required'],
            'description_theme.*' => ['required'],
        ]);

        $theme = new Theme();
            $theme->album_id = $request['album_id'];
            $theme->name_theme = $request['name'];
            $theme->description_theme = $request['description'];
            $theme->save();

            if ($request->hasFile('photo_url')){
                $image = $this->hasImages($request, 'photo_url');
                $theme->hasImages()->createMany($image);
            }

            return $theme->toJson();
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
        if ($theme)
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

        $request->validate([
           'photo_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $themeImage = new Image();
            $themeImage->theme_id = $request->theme_id;
            $themeImage->photo_url = $request->photo_url->store('url_img');
            $themeImage->save();
            return $themeImage->toJson();
    }

    public function getTheme($id)
    {
        $theme =  Theme::find($id);
        if ($theme){
            return view('admin.edit_theme', compact('theme'));
        }
        return redirect()->route('admin');
    }

    public function updateTheme(Request $request, $id)
    {
        $theme = Theme::find($id);
        if ($theme)
        {
            $theme->name_theme = $request->input('name');
            $theme->description_theme = $request->input('description');
            $theme->save();
            return $theme->toJson();
        }
        return redirect()->route('admin');
    }


    public function destroyPhoto ($id)
    {
        $image = Image::find($id);
        if ($image)
        {
            $photo_url = $image->photo_url;
            Storage::delete([$photo_url]);
            $image->delete();
            return redirect()->back()->with('success','Foto removida com sucesso.');;
        }
        return redirect()->route('admin');
    }

    public function destroyComment ($id)
    {
        $comment = Comment::find($id);
        if ($comment)
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
