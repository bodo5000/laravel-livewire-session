<?php


namespace App\Repositories\Post\Eloquent;

use App\Repositories\EloquentBaseRepository;
use App\Repositories\Post\PostRepository;
use Illuminate\Support\Facades\Storage;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
{

    public function adminUpdate($model, $data)
    {
        $data['user_id'] = auth()->id();
        $oldImage = $model->image;
        if ($data['image'] != $oldImage) {
            $path = $data['image']->store('public/posts-images');
            $path = str_replace('public', 'storage', $path);
            Storage::disk('public')->delete($oldImage ?? '');
            $data['image'] = $path;
        }

        $this->update($model, $data);
    }
}
