<?php

namespace App\Livewire\Category;


use App\Repositories\Category\CategoryRepository;
use Livewire\Component;

class ListCategories extends Component
{

    public $categories;
    public $delete_id;

    public function render(CategoryRepository $categoryRepository)
    {
        $this->categories = $categoryRepository->all();
        return view('livewire.Category.list-categories')
            ->extends('layouts.admin')
            ->section('content');
    }

    public function edit($id)
    {
        $this->dispatch('getData', $id);
        $this->dispatch('show', 'admin-edit-category');
    }


    public function deleteId($id)
    {
        $this->delete_id = $id;
    }

    public function delete(CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($this->delete_id);
        if ($category) {
            $categoryRepository->delete($category);
            return redirect(route('admin.categories.index'))->with('success', 'Category deleted successfully!');
        }
        return redirect(route('admin.categories.index'))->with('error', 'Category not found!');
    }
}
