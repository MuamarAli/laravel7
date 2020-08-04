<?php

namespace App\Repository;

use App\Article;

/**
 * Class ArticleRepository
 *
 * @package App\Repository
 */
class ArticleRepository implements RepositoryInterface
{
    /**
     * @var Article
     */
    private $article;

    /**
     * ArticleRepository constructor.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get all articles.
     *
     * @author Ali, Muamar
     *
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->article->all();
    }

    /**
     * Create article.
     *
     * @param $attributes
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->article->create($attributes);
    }

    /**
     * Update article.
     *
     * @param $id
     * @param $attributes
     * @author Ali, Muamar
     *
     * @return bool
     */
    public function update($id, $attributes)
    {
        return $this->article->find($id)->update($attributes);
    }

    /**
     * Get single article.
     *
     * @param $id
     * @author Ali, Muamar
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->article->find($id);
    }

    /**
     * Delete article.
     *
     * @param $id
     * @author Ali, Muamar
     *
     * @throws \Exception
     *
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->article->find($id)->delete();
    }
}
