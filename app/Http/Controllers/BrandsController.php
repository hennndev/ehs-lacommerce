<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
  public function index(Request $request) {
    $title = "Brands";
    $query_search = $request->query("q");
    $data_in_query = Brand::where("name", "LIKE", "%" . $query_search . "%");
    $data = $data_in_query->paginate(10);
    return view("admin.brands.index", compact("title", "data"));
  }

  public function add() {
    $title = "Add Brand";
    return view("admin.brands.add", compact("title"));
  }

  public function edit($id) {
    $title = "Edit Brand";
    $data = Brand::find($id);
    if(!$data) {
      return redirect()->route("brands.index");
    }
    return view("admin.brands.edit", compact("title", "data"));
  }

  public function store(Request $request) {
    $validated_data = $request->validate([
      "name" => "required|string|min:2|unique:brands,name"
    ]);
    Brand::create($validated_data);

    return redirect()->route("brands.index")->with("success", "New brand has created");
  }

  public function update(Request $request, $id) {
    $validated_data = $request->validate([
      "name" => "required|string|min:2|unique:brands,name"
    ]);
    Brand::where("id", $id)->update($validated_data);

    return redirect()->route("brands.index")->with("success", "Brand has updated");
  }

  public function destroy($id) {
    Brand::where("id", $id)->delete();

    return response()->json([
      "message" => "Brand has deleted"
    ]);
  }
}
