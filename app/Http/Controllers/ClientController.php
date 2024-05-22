<?php

namespace App\Http\Controllers;

use App\Models\ReviewModel;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    public function clients_page(){
        $reviews=ReviewModel::all();
        return view('admin.client_says',compact('reviews'));
    }
    public function add_clients_reivew(Request $request){
        // dd($request->all());
        try {
            $request->validate([
                'image' => 'required|file|mimes:jpeg,png,jpg,webp',
                "name" => "required",
                "heading" => "required",
                "review" => "required",
                "star" => "required",

            ]);


            $file = $request->file('image');


            $targetDirectory = 'uploads/Client Images/';


            $fileName =  $file->getClientOriginalName();
            $file->move(public_path($targetDirectory), $file->getClientOriginalName());

            ReviewModel::create([
                'image' => $fileName,
                'name' => $request->name,
                'stars' => $request->star,
                'head' => $request->heading,
                'review' => $request->review,

            ]);

            return redirect()->back()->with('success', 'Review Added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }

    }
}
