<?php

namespace App\Http\Controllers;

/**
 * Class AbstractController
 *
 * @package App\Http\Controllers
 */
abstract class AbstractController extends Controller
{
    /**
     * @var Object
     */
    protected $model;

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model::all();
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->model->create($this->store());
    }

    abstract protected function store();
}
