<?php

namespace App\Http\Controllers;

use App\Models\HomeLastBannerModel;
use Illuminate\Http\Request;
use App\Models\HomeMainBannerModel;
use App\Models\HomeMiddleBannerModel;

class BannersController extends Controller
{
    public function main_banner()
    {
        $lists = HomeMainBannerModel::with('category')->get();
        return view('admin.home_mainbanner', compact('lists'));
    }

    public function insert_main_banner(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
            'category_id' => 'required',
            'type' => 'required',
        ]);

        $file = $request->file('image');
        $targetDirectory = 'uploads/Main Bannner/';

        // Generate a random 10-character string
        $randomString = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10)), 0, 10);
        // Get the original file extension
        $extension = $file->getClientOriginalExtension();
        // Create a new file name
        $fileName = $randomString . '_' . time() . '.' . $extension;

        $file->move(public_path($targetDirectory), $fileName);

        HomeMainBannerModel::create([
            'image' => $fileName,
            'title' => $request->title,
            'paragraph' => $request->paragraph,
            'sub_title' => $request->sub_title,
            'category_id' => $request->category_id,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function delete_main_banner($id)
    {
        $banner = HomeMainBannerModel::findOrFail($id);
        $banner->delete();
        return redirect()->back()->with('danger', 'Record deleted successfully.');
    }

    public function update_main_banner(Request $request, $id)
    {
        $request->validate([
            'new_image' => 'file|mimes:jpeg,png,jpg,webp',
        ]);

        $banner = HomeMainBannerModel::find($id);

        if (!$banner) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        if ($request->hasFile('new_image')) {
            // Upload and save the new image
            $file = $request->file('new_image');
            $targetDirectory = 'uploads/Main Bannner/';
            $randomString = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10)), 0, 10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $file->move(public_path($targetDirectory), $fileName);
            $banner->image = $fileName;
        }
        $banner->sub_title = $request->sub_title;
        $banner->title = $request->title;
        $banner->type = $request->type;
        $banner->paragraph = $request->paragraph;
        $banner->category_id = $request->category_id;
        $banner->save();

        return redirect()->back()->with('success', 'Record updated successfully.');
    }

    public function middle_banner()
    {
        $lists = HomeMiddleBannerModel::with('category')->get();
        return view('admin.home_middlebanner', compact('lists'));
    }

    public function insert_middle_banner(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
            'category_id' =>'required',

        ]);

        $file = $request->file('image');
        $targetDirectory = 'uploads/Middle Banner/';
        $randomString = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10)), 0, 10);
        $extension = $file->getClientOriginalExtension();
        $fileName = $randomString . '_' . time() . '.' . $extension;

        $file->move(public_path($targetDirectory), $fileName);

        HomeMiddleBannerModel::create([
            'image' => $fileName,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'discount' => $request->discount,
            'category_id' => $request->category_id,
        ]);

        return redirect()->back()->with('success', 'Banner uploaded successfully.');
    }

    public function delete_middle_banner($id)
    {
        $banner = HomeMiddleBannerModel::findOrFail($id);
        $banner->delete();
        return redirect()->back()->with('danger', 'Record deleted successfully.');
    }

    public function update_middle_banner(Request $request, $id)
    {
        $request->validate([
            'new_image' => 'file|mimes:jpeg,png,jpg,webp',
            'category_id' => 'required',
        ]);

        $banner = HomeMiddleBannerModel::find($id);

        if (!$banner) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        if ($request->hasFile('new_image')) {
            // Upload and save the new image
            $file = $request->file('new_image');
            $targetDirectory = 'uploads/Middle Banner/';
            $randomString = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10)), 0, 10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $file->move(public_path($targetDirectory), $fileName);
            $banner->image = $fileName;
        }
        $banner->sub_title = $request->sub_title;
        $banner->title = $request->title;
        $banner->discount = $request->discount;
        $banner->category_id = $request->category_id;
        $banner->save();

        return redirect()->back()->with('success', 'Record updated successfully.');
    }

    public function last_banner()
    {
        $lists = HomeLastBannerModel::with('category')->get();
        return view('admin.home_lastbanner', compact('lists'));
    }

    public function insert_last_banner(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
            'category_id' => 'required',
        ]);

        $file = $request->file('image');
        $targetDirectory = 'uploads/Last Banner/';
        $randomString = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10)), 0, 10);
        $extension = $file->getClientOriginalExtension();
        $fileName = $randomString . '_' . time() . '.' . $extension;

        $file->move(public_path($targetDirectory), $fileName);

        HomeLastBannerModel::create([
            'image' => $fileName,
            'title' => $request->title,
            'discount' => $request->discount,
            'category_id' => $request->category_id,
        ]);

        return redirect()->back()->with('success', 'Banner Added successfully.');
    }

    public function delete_last_banner($id)
    {
        $banner = HomeLastBannerModel::findOrFail($id);
        $banner->delete();
        return redirect()->back()->with('danger', 'Record deleted successfully.');
    }

    public function update_last_banner(Request $request, $id)
    {
        $request->validate([
            'discount' => 'required',
            'new_image' => 'file|mimes:jpeg,png,jpg,webp',
            'category_id' => 'required',
        ]);

        $banner = HomeLastBannerModel::find($id);

        if (!$banner) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        if ($request->hasFile('new_image')) {
            // Upload and save the new image
            $file = $request->file('new_image');
            $targetDirectory = 'uploads/Last Banner/';
            $randomString = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10)), 0, 10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $file->move(public_path($targetDirectory), $fileName);
            $banner->image = $fileName;
        }
        $banner->discount = $request->discount;
        $banner->title = $request->title;
        $banner->category_id = $request->category_id;
        $banner->save();

        return redirect()->back()->with('success', 'Record updated successfully.');
    }
}
