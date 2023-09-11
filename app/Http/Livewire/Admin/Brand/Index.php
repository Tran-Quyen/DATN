<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\BrandModel;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $brand_id, $category_id;

    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
            'category_id' => 'required|integer',
        ];
    }

    public function resetField(){
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
        $this->category_id = NULL;
    }

    public function storeBrand(){
        $data = $this->validate();
        BrandModel::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            'category_id' => $this->category_id,
        ]);
        session()->flash('message', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetField();
    }

    public function editBrand(int $brand_id){

        $this->brand_id = $brand_id;
        $brand = BrandModel::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;
    }

    public function updateBrand(){
        $data1 = $this->validate();
        BrandModel::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            'category_id' => $this->category_id,
        ]);
        session()->flash('message', 'Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetField();
    }

    public function deleteBrand($brand_id) {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand(){
        BrandModel::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetField();
    }

    public function render()
    {
        $categories = Category::where('status', '0')->get();
        $brands = BrandModel::query()->orderBy('updated_at', 'desc')->paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $categories])
                            ->extends('layouts.admin')
                            ->section('content');
    }
}
