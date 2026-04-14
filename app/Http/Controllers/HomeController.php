<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    public function __invoke()
    {
        $ids = Auth::user()->followings()->pluck("users.id")->toArray();
        $posts = Post::whereIn("user_id", $ids)->latest()->paginate(20);

        if ($posts->isEmpty())
            $posts = Post::inRandomOrder()->paginate(20);


        return view("home", [
            "posts" => $posts
        ]);
    }
}
