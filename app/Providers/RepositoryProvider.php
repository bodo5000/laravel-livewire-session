<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\Eloquent\EloquentCategoryRepository;
use App\Repositories\Post\Eloquent\EloquentPostRepository;
use App\Repositories\Post\PostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepository::class , function(){
            return new EloquentPostRepository(new Post());
        });

        $this->app->bind(CategoryRepository::class , function(){
            return new EloquentCategoryRepository(new Category());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
