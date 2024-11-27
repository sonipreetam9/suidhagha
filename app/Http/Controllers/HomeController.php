<?php

namespace App\Http\Controllers;

use App\Models\SubCategoryModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\StateModel;
use App\Models\BlogModel;
use App\Models\BrandModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\CategorieModel;
use App\Models\HomeLastBannerModel;
use App\Models\HomeMainBannerModel;
use App\Models\HomeMiddleBannerModel;
use App\Models\ReviewModel;
use App\Models\SectionModel;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home_page()
    {
        $var = "home";
        $sections = SectionModel::with('products')->get();
        $item = ProductModel::with('category')->with('subcategory')->orderBy("id", "desc")->get();
        $count = 0;
        if ($sections->isNotEmpty()) {
            $blog = BlogModel::orderBy("id", "desc")->paginate(4);
            $newbrand = BrandModel::orderBy("id", "desc")->paginate(10);
            $reviews = ReviewModel::all();
            $desktopBanners = HomeMainBannerModel::where('type', 'desktop')->get();
            $mobileBanners = HomeMainBannerModel::where('type', 'mobile')->get();
            $midbanners = HomeMiddleBannerModel::with('category')->latest()->first();
            $lastbanners = HomeLastBannerModel::with('category')->latest()->first();
            $categories = CategorieModel::orderBy("seq", "asc")->get();

            $data = compact("blog", "item", "newbrand", "reviews", "categories", "sections", "count", "midbanners", "lastbanners", "var","desktopBanners","mobileBanners");
            return view("index", $data)->with($data);
        } else {
            $desktopBanners = HomeMainBannerModel::where('type', 'desktop')->get();
            $mobileBanners = HomeMainBannerModel::where('type', 'mobile')->get();
            $midbanners = HomeMiddleBannerModel::latest()->first();
            $lastbanners = HomeLastBannerModel::latest()->first();
            $categories = CategorieModel::orderBy("seq", "asc")->get();
            return view("index", compact('item', 'categories', 'lastbanners', 'midbanners', "var","desktopBanners","mobileBanners"));
        }
    }

    public function find_by_categorie($catName)
    {


        // Decode the URL-encoded characters
        $decodedCatName = str_replace('-', ' ', $catName);

        // Lookup the category in the database
        $allcategories = CategorieModel::all();
        $categorie = CategorieModel::where("name", $decodedCatName)->first();
        if ($categorie) {
            $products = ProductModel::where('category_id', $categorie->id)->get();
            return view("shop", compact('products', 'allcategories'));
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }
    public function find_by_sub_categorie($subCate)
    {
        // Decode the URL-encoded characters
        $decodedCatName = str_replace('-', ' ', $subCate);

        // Lookup the subcategory in the database
        $subcategorie = SubCategoryModel::where("name", $decodedCatName)->first();

        if ($subcategorie) {
            // Fetch products under the subcategory
            $products = ProductModel::where('sub_category_id', $subcategorie->id)->get();

            // Fetch all subcategories (replace 'categroy_id' with actual category ID you want)
            $subcategories = SubCategoryModel::where('category_id', $subcategorie->category_id)->get();

            return view("shop", compact('products', 'subcategories'));
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }


}
