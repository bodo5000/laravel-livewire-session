<?php


namespace App\Repositories\Post;

use App\Repositories\BaseRepository;

interface PostRepository extends BaseRepository
{

    public function adminUpdate($model, $data);
}
