<?php

namespace App\Services;

use App\Repository\ArticleRepository;

/**
 * Class ArticleService
 *
 * @package App\Services
 */
class ArticleService
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * ArticleService constructor.
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getAll()
    {
        return $this->articleRepository->all();
    }

    public function create($attributes)
    {
        return $this->articleRepository->create($attributes);
    }

    public function update($id, $attributes)
    {
        return $this->articleRepository->update($id, $attributes);
    }

    public function find($id)
    {
        return $this->articleRepository->find($id);
    }

    public function delete($id)
    {
        return $this->articleRepository->delete($id);
    }
}
