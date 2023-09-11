<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $sliders = Slider::where('status', '0')->get();
        $new = Product::latest()->take(10)->get();
        $trendingProducts = Product::where('trending', '1')->take(10)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(10)->get();
        return view('frontend.carousel.index', compact('sliders', 'trendingProducts', 'new', 'featuredProducts'));
    }
    public function searchProducts(Request $request) {
        if($request->search) {
            $searchProducts = Product::where('name', 'like', '%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts'));
        }else {
            return redirect()->back()->with('message', 'Empty search');
        }
    }
    public function trendingProducts(){
        $trendingProducts = Product::where('trending', '1')->get();
        return view('frontend.pages.trending-products', compact('trendingProducts'));
    }
    public function newArrival(){
        $new = Product::latest()->take(10)->get();
        return view('frontend.pages.new-arrival', compact('new'));
    }
    public function featuredProducts(){
        $featuredProducts = Product::where('featured', '1')->latest()->get();
        return view('frontend.pages.featured-products', compact('featuredProducts'));
    }
    public function categories(){
        $cats = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('cats'));
    }

    public function products($category_slug){
        $category = Category::where('slug', $category_slug )->first();
        if($category) {
            return view('frontend.collections.products.index', compact('category'));
        }else {
            return redirect()->back();
        }
    }

    public function productDetail(string $category_slug, string $product_slug){
        $category = Category::where('slug', $category_slug )->first();
        if($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if($product){
                return view('frontend.collections.products.detail', compact('product', 'category'));
            }else {
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function thankyou(){
        return view('frontend.thankyou.thank-you');
    }
}
