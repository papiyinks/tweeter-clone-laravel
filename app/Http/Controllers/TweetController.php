<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.dashboard', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => ['required_without:image', 'max:255'],
            'image' => ['file'],
        ]);

        if (request('image')) {
            $attributes['image'] = request('image')->store('tweet-images');
        }

        if (request('body') && (request('image') === null)) {
            Tweet::create([
                'user_id' => auth()->id(),
                'body' => $attributes['body'],
            ]);

            return redirect('/dashboard');
        }

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'image' => $attributes['image']
        ]);

        return redirect('/dashboard');
    }
}
