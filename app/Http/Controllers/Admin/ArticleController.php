<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Services\ArticleService;
use Illuminate\Support\Facades\Auth;

/**
 * Class ArticleController
 *
 * @package App\Http\Controllers\Admin
 */
class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    private $articleService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArticleService $articleService)
    {
        $this->middleware('auth');
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'article.index',
            ['articles' => Article::all()]
        );
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
     * @param ArticleRequest $articleRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $articleRequest)
    {
//        $article = Article::create($articleRequest->validated());

        $article = $this
            ->articleService
            ->create(
                $articleRequest->validated()
            );

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
        return view(
            'article.show', [
            'article' => $this->articleService->find($article->id)
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
            'article' => $this->articleService->find($article->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $articleRequest
     * @param Article $article
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ArticleRequest $articleRequest, Article $article)
    {
//        $article->update($articleRequest->validated());
        $this->articleService->update($article->id, $articleRequest->validated());

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
//        $article->delete();
        $this->articleService->delete($article->id);

        return redirect()->back()->with('status', 'Successfully Deleted!');
    }
}
