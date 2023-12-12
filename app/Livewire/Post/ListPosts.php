<?php

namespace App\Livewire\Post;


use App\Repositories\Post\PostRepository;
use Livewire\Component;

class ListPosts extends Component
{

    public $postRepository;
    public $posts;
    public $delete_id;

    public function render(PostRepository $postRepository)
    {
        $this->posts = $postRepository->all();
        return view('livewire.post.list-posts')
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
}
