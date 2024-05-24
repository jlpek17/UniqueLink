<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {


        // validateur      
        $dataValidated = $request->validate([
            'id' => ['required', 'integer'],
            'content' => ['required', 'string', 'max:255'],
            'image' => ['string', 'max:255'],
            'tags' => ['required', 'string', 'max:255']
        ]);
    

        // sauvegarder messsage Post::create([])
        Post::create([
            'user_id' => $dataValidated['id'],
            'content' => $dataValidated['content'],
            'image' => $dataValidated['image'],
            'tags' => $dataValidated['tags']
        ]);
        

        // redirection vers home
            return view('home');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
