<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $getLikedTweet= Like::where('tweet_id', $tweet->id)->where('liked', true)->get();

        if ($getLikedTweet->count() > 0) {

        Like::where('tweet_id', $tweet->id)->delete();

            return back();
        }

        $tweet->like(current_user());

        return back();
    }

    public function destroy(Tweet $tweet)
    {
        $getLikedTweet= Like::where('tweet_id', $tweet->id)->where('liked', false)->get();

        if ($getLikedTweet->count() > 0) {

        Like::where('tweet_id', $tweet->id)->delete();

            return back();
        }

        $tweet->dislike(current_user());

        return back();
    }
}
