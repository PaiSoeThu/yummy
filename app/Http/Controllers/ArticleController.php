<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $this->authorize('view',Article::class);

        $articles = Article::when(request()->has('keyword'),function($query){
           $query->where(function(Builder $builder){
            $keyword = request()->keyword;
            $builder->where("title","like","%".$keyword."%");
            $builder->orWhere("description","like","%".$keyword."%");
           });
        })
        
        ->when(Auth::user()->role === 'user',function($query){
            $query->where('user_id',Auth::id());
        })
        ->latest('id')
        ->paginate(6)->withQueryString();
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
    //     if ($request->hasFile('featured_image')) {
    //         $newName = uniqid()."_feature_image.".$request->file('featured_image')->extension();
    //          $request->file('featured_image')->storeAs("public",$newName);
    //     }
        
    //    Article::create([
    //         "title"=>$request->title,
    //         "slug"=>Str::slug($request->title),
    //         "description"=>$request->description,
    //         "excerpt" => Str::words($request->description,30,"..."),
    //         "featured_image" => $newName,
    //         "category_id"=>$request->category,
    //         "user_id"=>Auth::id()
    //     ]);

        ////////
        $article = new Article();
        $article->title = $request->title;
        $article->slug =Str::slug($request->title);
        $article->description =$request->description;
        $article->excerpt = Str::words($request->description,30,"...");
    
        if ($request->hasFile('featured_image')) {
            // add image 
            $newName = uniqid()."_feature_image.".$request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs("public",$newName);
            $article->featured_image = $newName;
        }
        
        $article->category_id =$request->category;
        $article->user_id =Auth::id();
        $article->save();
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
        // $this->authorize('update',$article);

        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        // $this->authorize('update',$article);
       
      
        // return $request;
    //    $article->update([
    //         "title"=>$request->title,
    //         "slug"=>Str::slug($request->title),
    //         "description"=>$request->description,
    //         "excerpt" => Str::words($request->description,30,"..."),
    //          "featured_image" => $newName,
    //         "category_id"=>$request->category,
    //         "user_id"=>Auth::id()
    //     ]);
    $article->title = $request->title;
    $article->slug =Str::slug($request->title);
    $article->description =$request->description;
    $article->excerpt = Str::words($request->description,30,"...");

    if ($request->hasFile('featured_image')) {
        // delete image
        Storage::delete('public/'.$article->featured_image); 
        // add image 
        $newName = uniqid()."_feature_image.".$request->file('featured_image')->extension();
        $request->file('featured_image')->storeAs("public",$newName);
        $article->featured_image = $newName;
    }
    
    $article->category_id =$request->category;
    $article->user_id =Auth::id();
    $article->update();

        return redirect()->route('article.index')->with('status','Item Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // $this->authorize('delete',$article);
        if (isset($article->featured_image)) {
            Storage::delete('public/'.$article->featured_image); 
        }
        $article->delete();
        return redirect()->route('article.index')->with('status','Item Deleted Successful');
    }
}
