<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with("category")->get();
        $photos = Photo::all();
        return view("article.index",compact("articles","photos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("article.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validate([
            "title" => "required",
            "category_id" => "required",
            "photo" => "required",
            "description" => "required"
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->user_id = Auth::id();
        $article->description = $request->description;
        $article->save();

        $p = new Photo();
        $newName = uniqid()."_article_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs("public/img",$newName);
        $p->name =$newName;
        $p->article_id = $article->id;
        $p->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $photos = Photo::all();
        return view("article.detail",compact("article","photos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("article.edit",compact("article"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request->validate([
            "title" => "required",
            "category_id" => "required",
            "photo" => "required",
            "description" => "required"
        ]);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->description = $request->description;
        $article->update();
        $currentPhoto = [];
        $photos = Photo::all();
        foreach ($photos as $photo){
            if ($photo->article_id == $article->id){
                 $currentPhoto = $photo;
            }
        }

        $newName = uniqid()."_article_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs("public/img",$newName);
        $currentPhoto->name =$newName;
        $currentPhoto->article_id = $article->id;
        $currentPhoto->update();

        return redirect()->route("article.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $photos = Photo::all();
        foreach ($photos as $photo){
            if ($photo->article_id == $article->id){
                $photo->delete();
            }
        }
        $article->delete();
        return redirect()->back();
    }
}
