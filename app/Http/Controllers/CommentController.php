<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validateur      
        $dataValidated = $request->validate([
            'content' => ['required', 'string', 'max:255'],
            //'image' => ['string', 'max:255'],
            'post_id' => ['integer'],
            'tags' => ['string', 'max:255']
        ]);


        // sauvegarder messsage Post::create([])
        Comment::create([
            
            'content' => $dataValidated['content'],
            //'image' => $dataValidated['image'],
            'tags' => $dataValidated['tags'],
            'post_id' => $dataValidated['post_id'],
            'user_id' => Auth::user()->id

        ]);

        // redirection vers home
//        return redirect()->route('home');
        return back()->with('message','Le commentaire a été ajouté');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comment/editComment', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */

    

    

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        
        $request->validate([
            'content' => 'required|max:250',
        ]);

        //on modifie les infos de l'utilisateurs
        $comment->content = $request->input('content');

        //on sauvegarde les changement en bdd
        $comment->save();

        //on redirige sur la page precedente
        return back()->with('message','Le commentaire a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        //on redirige sur la page precedente
        return redirect()->route('home')->with('message','Le commentaire a bien été supprimé');
    }
}
