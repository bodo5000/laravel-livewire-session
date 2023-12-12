<?php

namespace App\Livewire\Post;

use App\Repositories\Post\PostRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditPostModal extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $description;
    public $image;

    #[On('getData')]
    public function getData($id, PostRepository $postRepository)
    {
        $this->post = $postRepository->find($id);
        $this->title = $this->post->title;
        $this->description = $this->post->description;
        $this->image = $this->post->image;
    }

    public function render()
    {
        return view('livewire.post.edit-post-modal');
    }

    public function submit(PostRepository $postRepository)
    {
        $data = $this->validate();
        $postRepository->adminUpdate($this->post, $data);
        return redirect(route('admin.posts.index'))->with('update-success', 'Post Updated Successfully');
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ];
    }
}
