<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;

class ExploreController extends Controller
{
    //

    public function index()
    {

        $followingUsers = auth()->user()->follows()->pluck('id');
        $users = User::whereNotIn('id', $followingUsers)->paginate(50);
        return view('explore', compact('users'));
    }
}