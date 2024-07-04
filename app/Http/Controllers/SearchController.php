<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'string|min:3'
        ]);
        $searchQuery = $request->input('query');
                $searchResult = Post::where('content', 'LIKE', "%$searchQuery%")
                ->orWhere('tags', 'LIKE', "%$searchQuery%")
                ->latest()
                ->paginate(2);

        return view('search/search', [
            'query' => $searchQuery,
            'searchResult' => $searchResult
        ]);
    }

}
