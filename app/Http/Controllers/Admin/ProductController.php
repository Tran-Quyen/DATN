<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\BrandModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->orderBy('updated_at', 'desc')->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = BrandModel::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        $data = $request->validated();
        $cat = Category::findOrFail($data['category_id']);
        $product = $cat->products()->create([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'slug' => $data['slug'],
            'brand' => $data['brand'],
            'small_description' => $data['small_description'],
            'description' => $data['description'],
            'original_price' => $data['original_price'],
            'selling_price' => $data['selling_price'],
            'quantity' => $data['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'featured' => $request->featured == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $data['meta_title'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description']
        ]);

        if($request->hasFile('image')) {
            $path = 'uploads/products/';
            $i = 1;
            foreach($request->file('image') as $imgFile) {
                $extension = $imgFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imgFile->move($path, $filename);
                $finalPath = $path.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalPath,
                ]);
            }
        }

        return redirect('/admin/products')->with('message', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $categories = Category::all();
        $brands = BrandModel::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, int $id)
    {
        $data = $request->validated();

        $product = Category::findOrFail($data['category_id'])
                        ->products()->where('id', $id)->first();

        if($product) {
            $product->update([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'brand' => $data['brand'],
                'small_description' => $data['small_description'],
                'description' => $data['description'],
                'original_price' => $data['original_price'],
                'selling_price' => $data['selling_price'],
                'quantity' => $data['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'featured' => $request->featured == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $data['meta_title'],
                'meta_keyword' => $data['meta_keyword'],
                'meta_description' => $data['meta_description']
            ]);

            if($request->hasFile('image')) {
                $path = 'uploads/products/';
                $i = 1;
                foreach($request->file('image') as $imgFile) {
                    $extension = $imgFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imgFile->move($path, $filename);
                    $finalPath = $path.$filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalPath,
                    ]);
                }
            }

            return redirect('/admin/products')->with('message', 'Product Updated Successfully');

        }else {
            return redirect('admin/products')->with('message', 'Product not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function deleteProduct(Request $request){
        $product = Product::findOrFail($request->product_id);
        $product->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function destroyImage(Request $request) {
        $productImage = ProductImage::findOrFail($request->img_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function searchProduct(Request $request){
        $products = Product::where('name', 'like', '%'.$request->search_str.'%')
                            ->orWhere('selling_price', 'like', '%'.$request->search_str.'%')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(5);
        if($products->count() >= 1) {
            return view('admin.products.show', compact('products'));
        }else {
            return response()->json([
                'status' => 'nothing_found'
            ]);
        }
    }
}
