<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Image;
use App\Models\Category;
use App\Models\Accessory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accessoryimage;
use Illuminate\Support\Facades\Storage;

class AccessoryController extends Controller
{



    function singleImage($request){
        $exten = $request->thumbnail_image->extension();
        $name =  'AsseccoryImage-' . Str::slug($request->name). uniqid(). '.'.$exten;
        $path = $request->thumbnail_image->storeAs('AsseccoryImage', $name , 'public');
        $url = config('app.url') . '/storage/' . $path;
        return [
        'image' => $name,
        'image_url' =>$url
        ];
    }

    function imagedelete($accessories){
        $path = 'AsseccoryImage/' . $accessories->image;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        return true;
    }
    function dataStore($request, $accessories , $imagestore= null){
         // Set basic attributes
    $accessories->category_id = $request->parent_category;
    $accessories->name = $request->name;
    $accessories->slug = $request->slug;
    $accessories->price = $request->price;
    $accessories->stock = $request->stock;
    $accessories->discount_price = $request->discount_price;
    $accessories->start_date = $request->discount_price_start_date;
    $accessories->end_date = $request->discount_price_end_date;
    $accessories->stock = $request->stock; // Ensure this is passed from the form and has a value

    $accessories->description = $request->desc;

    // Check if image is uploaded and handle the file storage
    if ($request->hasFile('thumbnail_image')) {
        // Assuming $imagestore is an array with 'image' and 'image_url' keys
        $accessories->image = $imagestore['image']; // The stored image file path
        $accessories->image_url = $imagestore['image_url']; // The image URL (optional)
    }

    // Save the accessories record in the database
    $accessories->save();
    }






    function view(){
        $categories = Category::select('id','title')->get();
        return view('Backend.Accessory.add_accessory', compact('categories'));
    }

    function allAccessory(){
        $accessories = Accessory::select('id', 'name', 'image_url', 'category_id', 'price', 'status')
    ->orderBy('created_at', 'desc') // Sort by created_at in descending order
    ->simplePaginate(15); // This ensures pagination with 15 items per page.
        return view('Backend.Accessory.all_accessory', compact('accessories'));
    }

    function insert(Request $request){
        //? product validation
            $request->validate([
                'name' => 'required|unique:accessories,name',
                'slug' => 'string|unique:accessories,slug',
                'parent_category' => 'required',
                'desc' => 'required',
                'status' => 'required',
                'price' => 'required',
                'thumbnail_image' => 'required|mimes:png,jpg',
            ]);



        //? product store
    //?single image store

    $imagestore = $this->singleImage($request);
    $accessories = new Accessory();
    $this->dataStore($request,$accessories,$imagestore);
    return redirect()->route('accessory.all')->with('success', 'Accessory Product Add Successfully');
    }


    function statusUpdate(Accessory $accessories){
        if($accessories->status == 0){
            $accessories->update([
                'status' => $accessories->status = 1,
            ]);
        }else{
            $accessories->update([
                'status' => $accessories->status = 0,
            ]);
        }

        return back()->with('success', 'you status update successfully');
    }

    function editAccessory(Accessory $accessories){
        $categories = Category::select('id','title')->get();
        return view('Backend.Accessory.edit_accessory', compact('accessories', 'categories'));
    }

    function updateAccessory(Request $request, Accessory $accessories){

        

        if ($request->hasFile('thumbnail_image')) {
            $imgdelete = $this->imagedelete($accessories);

            if($imgdelete){
                $imagestore = $this->singleImage($request);
                $this->dataStore($request,$accessories,$imagestore);
            }
        } else {
            // data store
            $this->dataStore($request,$accessories);
        }

        return back();
    }

    function deleteAccessory(Accessory $accessories){
        $isDelete = $this->imageDelete($accessories);

        if($isDelete){
            $accessories->delete();
        }
        return redirect()->route('accessory.all')->with('deletesuccess', 'Category delete Successfully');
    }


}
