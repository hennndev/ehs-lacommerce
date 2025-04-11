<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request) {
        $title = "Products";
        $query_search = $request->query("q");
        $data_in_query = Product::where("name", "LIKE", "%" . $query_search . "%")
                                ->orWhereHas("category", function($query) use ($query_search){
                                    $query->where("name", "LIKE", "%" . $query_search . "%");
                                })
                                ->orWhereHas("brand", function($query) use ($query_search){
                                    $query->where("name", "LIKE", "%" . $query_search . "%");
                                });
        $data = $data_in_query->paginate(10);
        return view("admin.products.index", compact("title", "data"));
    }

    public function add() {
        $title = "Add Product";
        $categories = Category::all();
        $brands = Brand::all();
        return view("admin.products.add", compact("title", "categories", "brands"));
    }

    public function edit($id) {
        $title = "Edit Product";
        $data = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view("admin.products.edit", compact("title", "data", "categories", "brands"));
    }

    public function store(Request $request) {
        $validated_data = $request->validate([
            "name" => "required|string|min:2",
            "price" => "required|integer|min:1",
            "stocks" => "required|integer|min:0",
            "description" => "required|string|min:5",
            "brand" => "required|string",
            "category" => "required|string"
        ]);
        Product::create([
            "name" => $validated_data["name"],
            "price" => $validated_data["price"],
            "stocks" => $validated_data["stocks"],
            "description" => $validated_data["description"],
            "brand_id" => $validated_data["brand"],
            "category_id" => $validated_data["category"]
        ]);

        return redirect()->route("products.index")->with("success", "New product has added");
    }

    public function update(Request $request, $id) {
        $validated_data = $request->validate([
            "name" => "required|string|min:2",
            "price" => "required|integer|min:1",
            "stocks" => "required|integer|min:0",
            "description" => "required|string|min:5",
            "brand" => "required|integer",
            "category" => "required|integer"
        ]);
        Product::where("id", $id)->update([
            "name" => $validated_data["name"],
            "price" => $validated_data["price"],
            "stocks" => $validated_data["stocks"],
            "description" => $validated_data["description"],
            "brand_id" => $validated_data["brand"],
            "category_id" => $validated_data["category"]
        ]);

        return redirect()->route("products.index")->with("success", "Products has updated");
    }

    public function destroy($id) {
        Product::where("id", $id)->delete();

        return response()->json([
            "message" => "Product has deleted"
        ]);
    }
}
