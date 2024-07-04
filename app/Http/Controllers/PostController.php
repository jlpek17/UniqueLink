<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validateur      
        $dataValidated = $request->validate([
            'content' => ['required', 'string', 'max:255'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => ['required', 'string', 'max:255']
        ]);


        // sauvegarder messsage Post::create([])
        Post::create([
            'user_id' => Auth::user()->id,
            'content' => $dataValidated['content'],
            'tags' => $dataValidated['tags'],
            'image' => isset($dataValidated['image']) ? uploadImage($dataValidated['image']) : null
        ]); // null can be replace by "default_user.jpg" in order to add a default image


        // redirection vers home
        return redirect()->route('home');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('post/editPost', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('delete', $post);

        $request->validate([
            'content' => 'required|max:250',
        ]);

        //on modifie les infos de l'utilisateurs
        $post->content = $request->input('content');

        //on sauvegarde les changement en bdd
        $post->save();

        //on redirige sur la page precedente
        return back()->with('message', 'Le linker a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        //on redirige sur la page precedente
        return redirect()->route('home')->with('message', 'Le linker a bien été supprimé');
    }
}
