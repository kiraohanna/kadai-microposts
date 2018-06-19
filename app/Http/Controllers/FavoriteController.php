<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->like($id);
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unlike($id);
        return redirect()->back();
    }
    
    public function index()
    {
        $data = [];
        if(\Auth::check()) {
            $user = \Auth::user();
            $favorites = $user->feed_favorites()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'favorites' => $favorites,
            ];
            return view('favoritelist', $data);
        }
        else {
            print "This page cannot be displayed.";
        }
    }
}
