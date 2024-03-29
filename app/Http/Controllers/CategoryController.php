<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Article;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',Category::class);

        $categories = Category::when(request()->has('keyword'),function($query){
            $keyword = request()->keyword;
            $query->where("title","like","%".$keyword."%");
        })
        ->latest('id')
        ->paginate(5)->withQueryString();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Category::class);

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create',Category::class);

         Category::create([
            'title' => $request->title,
            'slug'=>Str::slug($request->title),
            "user_id"=>Auth::id()
        ]);
        return redirect()->route('category.index')->with('status','New Category Created');
    }

    /**
     * Display the specified resource.
     */
   
    public function show(Article $article)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $this->authorize('update',Category::class);

        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
         $this->authorize('update',$category);

        // if ($request->user()->cannot('update',$category)){
        //     return abort(403,'sorry');
        // }
        
        $category->update([
            "title" => $request->title,
            "slug" => Str::slug($request->title)
        ]);
        return redirect()->route('category.index')->with('status','Category Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete',$category);
        $category->delete();
        return redirect()->route('category.index')->with('status','Category Deleted Success');
    }
}
