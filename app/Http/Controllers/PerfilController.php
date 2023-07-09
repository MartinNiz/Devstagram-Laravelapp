<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');   
    }
     
    public function index() 
    {
        return view('profile.index');
    }

    public function store(Request $request) 
    {
        if(!Hash::check($request->password, auth()->user()->password)) {
            return back()->with('message', 'Incorrect password');
        }

        $request->request->add(['username' => Str::slug($request->username)]);

        //validate
        $this->validate($request, [
            'username' => ['required', 'max:30', 'min:3', 'unique:users,username,' . auth()->user()->id , 'not_in:twitter,instagram,facebook,meta,linkedin,edit-profile'],
        ]);

        //save image
        if ($request->image) {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->extension();
            $imageServer = Image::make($image);
            $imageServer->fit(1000, 1000);
            $imagePath = public_path('profiles') . '/' . $imageName;
            $imageServer->save($imagePath);
        }

        //save changes
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->image = $imageName ?? auth()->user()->image ?? '';
        $user->save();

        //redirect (no usar auth() por que quizas cambio el username)
        return redirect()->route('posts.index', $user->username);
    }
}
