<?php

namespace App\Http\Controllers;

use App\Models\CategorieModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_categoty_page()
    {
        return view('admin.add_category');
    }
    public function add_categoty(Request $request)
    {$originalString = $request->name;
        $modifiedString = str_replace(' ', '-', $originalString);


        $vaild = $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
            'name' => 'required',
            'seq' => 'required',
            'type'=>'required',
        ]);
        if ($vaild) {
            $file = $request->file('image');
            $targetDirectory = 'uploads/Category Images/';
            $fileName =  $file->getClientOriginalName();
            $file->move(public_path($targetDirectory), $file->getClientOriginalName());
            CategorieModel::create([
                'image' => $fileName,
                'name' => $request->name,
                'seq' => $request->seq,
                'highlight' => $request->highlight,
                'url_link'=>$modifiedString,
                'in_navbar'=>$request->in_navbar,
                'type'=>$request->type
            ]);
            return redirect()->back()->with('success', 'Categroy Added successfully.');
        } else {
            return redirect()->back()->with('error', 'Something is Worng!');
        }
    }

    public function all_categoty_page()
    {
        $categorys = CategorieModel::orderBy('id', 'desc')->get();
        return view('admin.all_category', compact('categorys'));
    }
    public function delete_category($id)
    {
        $category = CategorieModel::find($id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('del_success', 'Category Deleted Successfully');
        }
        else {
            return redirect()->back()->with('del_error', 'Something gone Worng');
        }


    }
    public function update_category(Request $request, $id)
    {
        $originalString = $request->name;
        $modifiedString = str_replace(' ', '-', $originalString);
        $request->validate([
            'image' => 'file|mimes:jpeg,png,jpg,webp',
            'type'=>'required',
        ]);

        $categorie = CategorieModel::find($id);

        if (!$categorie) {
            return redirect()->back()->with('update_error', 'Something gone Worng');
        }

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('uploads/Category Images/' . $categorie->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload and save the new image
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $targetDirectory = 'uploads/Category Images/';
            $file->move(public_path($targetDirectory), $fileName);
            $categorie->image = $fileName;
        }
        $categorie->name = $request->name;
        $categorie->seq = $request->seq;
        $categorie->highlight = $request->highlight;
        $categorie->in_navbar = $request->in_navbar;
        $categorie->url_link=$modifiedString;
        $categorie->type=$request->type;
        $categorie->save();



        return redirect()->back()->with('update_success', 'Category updated successfully.');;
    }
}
