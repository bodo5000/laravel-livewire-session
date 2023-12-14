<?php

namespace App\Livewire\Category;

use App\Repositories\Category\CategoryRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditCategoryModal extends Component
{
    use WithFileUploads;

    public $category;
    public $title;
    public $description;
    public $image;

    #[On('getData')]
    public function getData($id, CategoryRepository $categoryRepository)
    {
        $this->category = $categoryRepository->find($id);
        $this->title = $this->category->title;
        $this->description = $this->category->description;
        $this->image = $this->category->image;
    }

    public function render()
    {
        return view('livewire.category.edit-category-modal');
    }

    public function submit(CategoryRepository $categoryRepository)
    {
        $data = $this->validate();
        $categoryRepository->adminUpdate($this->category, $data);
        return redirect(route('admin.categories.index'))->with('update-success', 'Category Updated Successfully');
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
