<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){
        $data = $request->validated();
        $cat = new Category;
        $cat->name = $data['name'];
        $cat->slug = Str::slug($data['slug']);
        $cat->description = $data['description'];

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/category/', $filename);
            $cat->image = $filename;
        }

        $cat->meta_title = $data['meta_title'];
        $cat->meta_keyword = $data['meta_keyword'];
        $cat->meta_description = $data['meta_description'];
        $cat->status = $request['status'] == true ? '1' : '0';
        $cat->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }

    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category){
        $data = $request->validated();
        $cat = Category::findOrFail($category);
        $cat->name = $data['name'];
        $cat->slug = Str::slug($data['slug']);
        $cat->description = $data['description'];

        if($request->hasFile('image')) {
            $path = 'uploads/category/'.$cat->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/category/', $filename);
            $cat->image = $filename;
        }

        $cat->meta_title = $data['meta_title'];
        $cat->meta_keyword = $data['meta_keyword'];
        $cat->meta_description = $data['meta_description'];
        $cat->status = $request['status'] == true ? '1' : '0';
        $cat->update();

        return redirect('admin/category')->with('message', 'Category Edited Successfully');
    }
}
