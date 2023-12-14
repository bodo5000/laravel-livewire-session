<?php

namespace App\Livewire\Category;

use App\Repositories\Category\CategoryRepository;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateCategoryModal extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $image;

    public function render()
    {
        return view('livewire.category.create-category-modal');
    }

    public function submit(CategoryRepository $categoryRepository)
    {
        $data = $this->validate();
        $data['image'] = $categoryRepository->saveImage($this->image, 'categories-images');
        $categoryRepository->create($data);
        return redirect(route('admin.categories.index'))->with('create-success', 'Category Created Successfully');
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
