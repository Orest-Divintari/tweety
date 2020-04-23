<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Support\Str;

class TweetController extends Controller
{
    //
    protected $guarded = [];

    public function index()
    {
        $tweets = auth()->user()->timeline();
        return view('tweets.index', compact('tweets'));
    }

    public function store(TweetRequest $request)
    {
        auth()->user()->tweets()->create($request->validated());
        return redirect(route('home'));
    }

    public function update(Tweet $tweet)
    {
        dd($tweet->dislikes);
        if (Str::endsWith(request()->path(), 'dislike')) {

            $tweet->dislike();
        } else {

            $tweet->like();
        }
        return back();
    }
}