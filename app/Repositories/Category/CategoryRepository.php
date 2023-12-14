<?php


namespace App\Repositories\Category;

use App\Repositories\BaseRepository;

interface CategoryRepository extends BaseRepository
{
    public function adminUpdate($model, $data);
}
