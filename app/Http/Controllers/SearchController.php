<?php

namespace App\Http\Controllers;

use App\Models\SubCategoryModel;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategorieModel;
class SearchController extends Controller
{
    public function search_products(Request $request)
    {
        $category = $request->input('categorie');
        $subcategory = $request->input('subcategorie');
        $name = $request->input('name');

        $query = ProductModel::query();

        // Filter by category if selected and it's not "All Categories"
        if ($category && $category != 0) {
            $query->where('category_id', $category);
        }

        // Filter by subcategory if selected and it's not "All Subcategories"
        if ($subcategory && $subcategory != 0) {
            $query->where('sub_category_id', $subcategory);
        }

        // Filter by product name if provided
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        // Execute the query
        $products = $query->get();

        // Retrieve all categories and subcategories for dropdowns
        $allcategories = CategorieModel::all();
        $allsubcategories = SubCategoryModel::all();

        // Pass search inputs to the view for the selected filters
        $searchedCatID = $category;
        $searchedSubCatID = $subcategory;
        $searchedName = $name;

        return view("shop", compact('products', 'allcategories', 'allsubcategories', 'searchedCatID', 'searchedSubCatID', 'searchedName'));
    }


}
