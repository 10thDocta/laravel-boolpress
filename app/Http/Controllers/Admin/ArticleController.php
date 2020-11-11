<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Tag;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //   $articles = Article::all();
      $user_id = Auth::id();
      $articles = Article::where('user_id', $user_id)->get();

      return view('admin.posts.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // dd($data["tag"]);

        $request->validate([
            "title" => "required",
            "slug" => "required|unique:articles",
            "content" => "required",
            "image" => "image"
        ]);

        // $path = Storage::disk('public')->put('images', $data["image"]);
 
        $newArticle = new Article;
        $newArticle->user_id = Auth::id(); 
        $newArticle->title = $data["title"];
        $newArticle->slug = $data["slug"];
        $newArticle->content = $data["content"];

        if (!isset($data['image'])) {
            $newArticle->save();        
        } else {
            $filename_original = $data['image']->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs('images', $data['image'], $filename_original);

            $newArticle->image = $path;
            
            $newArticle->save();
        }


        if (count($data["tag"]) > 0) {
            $tags = [];
            foreach ($data["tag"] as $tag) {
                if ($tag != "null") {
                    $tags[] = $tag;
                }
            }

            $newArticle->tags()->sync($tags);
        }

        return redirect()->route('admin.posts.show', $newArticle->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('admin.posts.show', compact('article')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('article', 'tags')); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);

        $request->validate([
            "title" => "required",
            'slug' => [
                'required',
                Rule::unique('articles', 'slug')->ignore($id)
            ],
            "content" => "required",
            "image" => "image"
        ]);
 
        $article = Article::find($id); 
        $article->user_id = Auth::id(); 
        $article->title = $data["title"];
        $article->slug = $data["slug"];
        $article->content = $data["content"];

        if (!isset($data['image'])) {
            $article->update();            
        } else {
            $filename_original = $data['image']->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs('images', $data['image'], $filename_original);
            $article->image = $path;
            $article->update();
        }

        if (count($data["tag"]) > 0) {
            $tags = [];
            foreach ($data["tag"] as $tag) {
                if ($tag != "null") {
                    $tags[] = $tag;
                }
            }

            $article->tags()->sync($tags);
        }

        return redirect()->route('admin.posts.show', $article->slug);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('admin.posts.index');
    }
}