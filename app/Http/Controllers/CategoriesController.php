<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request) {
        $title = "Categories";
        $query_search = $request->query("q");
        $data_in_query = Category::where("name", "LIKE", "%" . $query_search . "%");
        $data = $data_in_query->paginate(10);
        return view("admin.categories.index", compact("title", "data"));
    }

    public function add() {
        $title = "Add Category";
        return view("admin.categories.add", compact("title"));
    }

    public function edit($id) {
        $title = "Edit Category";
        $data = Category::find($id);
        if(!$data) {
            return redirect()->route("categories.index");
        }
        return view("admin.categories.edit", compact("title", "data"));
    }

    public function store(Request $request) {
        $validated_data = $request->validate([
            "name" => "required|string|unique:categories,name|min:2"
        ]);
        Category::create($validated_data);
        return redirect()->route("categories.index")->with('success', 'New category has created!');;
    }
    public function update(Request $request, $id) {
        $validated_data = $request->validate([
            "name" => "required|string|unique:categories,name|min:2"
        ]);
        Category::where("id", $id)->update($validated_data);

        return redirect()->route("categories.index")->with("success", "Category has updated");
    }
    public function destroy($id) {
        Category::where("id", $id)->delete();

        return response()->json([
            "message" => "Job has deleted"
        ]);
    }
}
