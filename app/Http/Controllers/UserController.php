<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // /**
    //  * Show the form for editing the specified resource. [ORIGINAL]
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }


    // /**
    //  * Update the specified resource in storage. [ORIGINAL]
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage. [ORIGINAL]
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'pseudo' => 'required|max:40',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //on modifie les infos de l'utilisateurs
        $user->pseudo = $request->input('pseudo');
        
        if($request->image){
            $user->image = uploadImage($request->image);

        };

        //on sauvegarde les changement en bdd
        $user->save();

        //on redirige sur la page precedente
        return back()->with('message','Le compte a bien été modifié');
    }


    // /**
    //  * Remove the specified resource from storage. [ORIGINAL]
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // on verifie que c'est bien l'utilisateur connecté qui fait la demande de supression
        // (les id doivent être identique)

        if (Auth::user()->id == $user->id)
        {
            $user->delete(); //on realise la supression
            return redirect()->route('login')->with('message', 'Le compte a bien été supprimé');
        } else {
            return redirect()->back()->withErrors(['erreur' > 'supression du compte impossible']);
        }

    }


}
