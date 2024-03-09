<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $this->authorize('view',Article::class);

        $articles = Article::when(request()->has('keyword'),function($query){
            $keyword = request()->keyword;
            $query->where("title","like","%".$keyword."%");
            $query->orWhere("description","like","%".$keyword."%");
        })
        ->latest('id')
        ->paginate(5)->withQueryString();
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        
       $article = Article::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "category_id"=>$request->category,
            "user_id"=>Auth::id()
        ]);
        return redirect()->route('article.index')->with('status','Item is created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('update',$article);
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        $this->authorize('update',$article);
       
      $article->update([
        "title"=>$request->title,
        "description"=>$request->description,
        "category_id"=>$request->category,

      ]);
        return redirect()->route('article.index')->with('status','Item Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete',$article);

        $article->delete();
        return redirect()->route('article.index')->with('status','Item Deleted Successful');
    }
}
