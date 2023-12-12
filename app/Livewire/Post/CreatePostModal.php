<?php

namespace App\Livewire\Post;

use App\Repositories\Post\PostRepository;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreatePostModal extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $image;

    public function render()
    {
        return view('livewire.post.create-post-modal');
    }

    public function submit(PostRepository $postRepository)
    {
        $data = $this->validate();
        $data['image'] = $postRepository->saveImage($this->image, 'posts-images');
        $data['user_id'] = auth()->user()->id;
        $postRepository->create($data);

        return redirect(route('admin.posts.index'))->with('create-success', 'Post Created Successfully');
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ];
    }
}
