<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    public function index(): View {
        $product = Product::with("product_categories")->get();
        return view("product", compact("product"));
    }

    public function create(): View {
        $product = new Product();
        $categories = ProductCategories::all();
        return view("product-form", compact("categories", "product"));
    }
    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            "name" => "required",
            "description" => "required",
            "category_id" => 'required|exists:product_categories,id',
        ]);

        Product::create($validated);
        return Redirect::route('product.index');
    }
    public function edit(Product $product): View {
        $categories = ProductCategories::all();
        return view("product-form", compact("product", "categories"));
    }
    public function update(Request $request, Product $product): RedirectResponse {
        $validated = $request->validate([
            "name" => "required",
            "description" => "required",
            "category_id" => 'required',
        ]);

        $product->update($validated);
        return Redirect::route("product.index");
    }
    public function destroy(Product $product): RedirectResponse {
        $product->delete();
        return Redirect::route("product.index");
    }
}
