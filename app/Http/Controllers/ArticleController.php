<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $articles = Article::with('categories')->paginate(1);
        return ArticleResource::collection($articles);
        // return response([
        //     "data" => $articles,
        // ], 200);
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
        $request->validate([
            "article_title" => ["required"]
        ]);

        $article = Article::create([
            'article_title'=>$request->article_title,
            'article_sub_title'=>$request->article_sub_title,
            'detail'=>$request->detail,
            'status'=>$request->status,
            'added_by' =>Auth::user()->id,
            'updated_by'=>Auth::user()->id,
        ]);

        $categories = $request->categories;

        $article->categories()->sync($categories);

        return response([
            "message"=> "Article Added sucessfully",
            ],
            200
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
