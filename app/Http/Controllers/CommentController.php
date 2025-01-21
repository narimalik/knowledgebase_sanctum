<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Throwable;

class CommentController extends Controller
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
        DB::beginTransaction();
        try{
            $request->validate([
                "comments_detail"=> ["required", "min:2", "max:100"],
                "parent_comment_id"=> ["required"],
                "article_id"=> ["required"],
            ]);

            Comment::create([
                "comments_detail" => $request->comments_detail,
                "parent_comment_id"=>$request->parent_comment_id,
                "article_id"=>$request->article_id,
                'added_by' => Auth::user()->id,
                'updated_by'=>Auth::user()->id,
            ]);
            DB::commit();
        }catch(Throwable $exception){
            DB::rollback();
        }
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
