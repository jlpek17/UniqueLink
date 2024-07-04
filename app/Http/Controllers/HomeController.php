<?php

namespace App\Http\Controllers;

use App\Models\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // récupération des posts sans options
        //$posts = Post::all();

        // récupération des posts : le plus récent en 1er
        //$posts = Post::latest()->get();
        
        // idem + eager loadings : récup auteur + commentaires + auteur de chaque commentaire
        $posts = Post::with('user', 'comments.user')->latest()->Paginate(5);
        //dd($posts);
        // $posts->load('user', 'comments.user');

        return view('home', [
            'posts' => $posts
        ]);
    }

}
