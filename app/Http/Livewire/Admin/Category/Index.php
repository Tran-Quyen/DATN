<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\SoftDeletes;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;
    public function render()
    {
        $cats = Category::query()->orderBy('updated_at', 'desc')->paginate(5);
        return view('livewire.admin.category.index', ['categories' => $cats]);
    }

    public function deleteCategory($category_id) {
        $this->category_id = $category_id;
    }

    public function destroyCategory(){
        $category = Category::find($this->category_id);
        $category->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message', 'Category deleted');
    }
}
