<?php

namespace App\Http\Controllers;

use App\Models\CategorieModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function add_sub_categoty_page()
    {
        $cates = CategorieModel::all();
        return view('admin.add_sub_category', compact('cates'));
    }
    public function add_sub_category(Request $request)
    {
        $valid = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
        ]);

        if ($valid) {
            $file = $request->file('image');
            $targetDirectory = 'uploads/sub-categories-images/';

            // Generate a new file name with the current timestamp and random string
            $timestamp = time();
            $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $timestamp . '_' . $randomString . '.' . $extension;

            // Move the file to the target directory
            $file->move(public_path($targetDirectory), $fileName);

            // Construct the full URL to the image
            $imagePath = $fileName;

            // Create the subcategory with the full URL for the image
            SubCategoryModel::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'logo' => $imagePath, // Store full URL
            ]);

            return redirect()->back()->with('success', 'Subcategory added successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function all_sub_categoty_page()
    {
        $sub_categories = SubCategoryModel::with('category')->orderBy('id', 'desc')->get();
        $categories = CategorieModel::all();
        return view('admin.all_sub_category_list', compact('sub_categories', 'categories'));
    }

    public function delete_sub_category($id)
    {
        $sub_category = SubCategoryModel::find($id);

        if ($sub_category) {
            if ($sub_category->logo) {
                $imagePath = parse_url($sub_category->logo, PHP_URL_PATH);
                $imagePath = public_path($imagePath);

                if (is_file($imagePath) && file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image file
                }
            }

            $sub_category->delete();

            return redirect()->back()->with('success', 'Subcategory deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, subcategory not found.');
        }
    }
    public function update_sub_category(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg,webp',
        ]);

        $sub_category = SubCategoryModel::find($id);

        if (!$sub_category) {
            return redirect()->back()->with('update_error', 'Something went wrong, subcategory not found.');
        }

        // Check if a new image is being uploaded
        if ($request->hasFile('image')) {
            if ($sub_category->logo) {
                $oldImagePath = parse_url($sub_category->logo, PHP_URL_PATH);
                $oldImagePath = public_path($oldImagePath);

                if (is_file($oldImagePath) && file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            $file = $request->file('image');
            $timestamp = time();
            $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $timestamp . '_' . $randomString . '.' . $extension;
            $targetDirectory = 'uploads/sub-categories-images/';

            $file->move(public_path($targetDirectory), $fileName);

            $sub_category->logo = $fileName;
        }

        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;

        $sub_category->save();

        return redirect()->back()->with('update_success', 'Subcategory updated successfully.');
    }
    public function all_subCategory_ui()
    {
        // Fetch subcategories with their related category
        $subCategories = SubCategoryModel::with('category')->get();

        // Check if no subcategories are found
        if ($subCategories->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No subcategories found.',
                'status' => 404
            ], 404);
        }

        // Return the subcategories along with their categories
        return response()->json([
            'data' => $subCategories,
            'success' => true,
            'status' => 200,
        ], 200);
    }
public function subcategories($category_id)
{
    $sub_categories = SubCategoryModel::with('category')->where('category_id', $category_id)->get();
    return response()->json([
        'subCategories' => $sub_categories,
        'success' => true,
        'status' => 200,
    ], 200);
}
}
