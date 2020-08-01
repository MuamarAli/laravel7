<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ArticleController
 *
 * @package App\Http\Controllers\Admin
 */
class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index',  ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($this->validateArticle($request));

        return redirect()->route('article.show', $article)->with('status', 'Successfully Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($this->validateArticle($request));

        return redirect($article->path())->with('status', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @throws \Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('status', 'Successfully Deleted!');
    }

    /**
     * Validate article attributes.
     *
     * @param Request $request
     *
     * @return array
     */
    public function validateArticle(Request $request): array
    {
        return $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
    }
}
