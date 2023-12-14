<?php

namespace App\Livewire\Post;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Post\PostRepository;
use Livewire\Component;

class ListPosts extends Component
{

    public $postRepository;
    public $posts;
    public $delete_id;
    public $category_id="";


    public function mount(PostRepository $postRepository){
        $this->posts = $postRepository->all();
    }

    public function render(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->all();
        return view('livewire.post.list-posts',compact('categories'))
            ->extends('layouts.admin')
            ->section('content');
    }

    public function edit($id)
    {
        $this->dispatch('getData', $id);
        $this->dispatch('show', 'admin-edit-post');
    }

    public function deleteId($id)
    {
        $this->delete_id = $id;
    }

    public function delete(PostRepository $postRepository)
    {
        $post = $postRepository->find($this->delete_id);
        if ($post) {
            $postRepository->delete($post);
            return redirect(route('admin.posts.index'))->with('success', 'Post deleted successfully!');
        }
        return redirect(route('admin.posts.index'))->with('error', 'Post not found!');
    }

    public function filterByCategory(PostRepository $postRepository){
        if($this->category_id == 'all')
        {
            $this->posts = $postRepository->all();
            return;
        }
        $category = Category::where('id', $this->category_id)->first();
        $this->posts = $category->posts;

    }
}
