<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Resources\CategoryResource;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends BaseApiController
{

    public function __construct(private CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return $this->success(
            $this->formatMany(
                $this->categoryRepository->all(),
                'App\Http\Resources\CategoryResource'
            ),
            "categories retreived succssefully",
            200
        );
    }

    public function store()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
