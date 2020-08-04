<?php

namespace App\Repository;

/**
 * Interface RepositoryInterface
 *
 * @package App\Repository
 */
interface RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function find(int $id);
}
