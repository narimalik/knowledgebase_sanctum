<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return response(
            [
                'data'=> $categories,

            ],
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        echo "I am in CategoryController:create() to show the Form"; exit;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //echo "I am in CategoryController:store() Take posted data and save in DB"; exit;

        $validate = $request->validate([
            "category_name" => ['required'],

        ]);

        Category::create([
            'category_name' => $request->category_name,
            'added_by' => Auth::user()->id,
            'updated_by'=>Auth::user()->id,
        ]);

        return response(
            [
                'message'=>'Category Has been created',
            ]
        , 200);
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        echo "I am in CategoryController:show()"; exit;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        echo "I am in CategoryController:edit()"; exit;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        echo "I am in CategoryController:update()"; exit;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        echo "I am in CategoryController:destroy()"; exit;
    }
}
