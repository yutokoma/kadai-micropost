<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // add

use App\Micropost;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        return view('users.index', [
            'users' => $users,
        ]);
        
    }
        
        public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

         $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data  
        );

    }

     public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $favorites,
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->microposts()->create([
            'content' => $request->content,
        ]);

        return redirect('/');
        //\Auth::user()->follow($id);
        //return redirect()->back();
    }

    public function destroy($id)
    {
        //\Auth::user()->unfollow($id);
        //return redirect()->back();
        $micropost = \App\Micropost::find($id);

        if (\Auth::user()->id === $micropost->user_id) {
            $micropost->delete();
        }

        return redirect()->back();
    }


}
    
    
    
