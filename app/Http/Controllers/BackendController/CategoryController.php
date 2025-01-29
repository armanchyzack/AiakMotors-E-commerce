<?php

namespace App\Http\Controllers\BackendController;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CAtegory;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    function ImageStor($request){
        // Image insert and name Proccess
        if($request->hasFile('category_image')){

            $exten  = $request->category_image->extension();
            $name = 'category-' . Str::slug($request->slug) . '.' . $exten;
            $path = $request->category_image->storeAs('Image', $name, 'public');
            $img_url = env('APP_URL') . Storage::url($path);
            // env("APP_URL") . 'storage/' . $path;

            return [
                'image' => $name,
                'img_url' => $img_url
            ];
        }
    }
    function imageDelete($categories){
        $path = 'Image/' . $categories->image;
        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }
        return true;
}

    function dataStore($request, $categories , $imagestore = []){

        $categories->title = $request->title;
        $categories->slug =  Str::slug($request->title);
        if($request->hasFile('category_image')){
            $categories->image = $imagestore['image'];
            $categories->image_url = $imagestore['img_url'];
        }
        $categories->save();
    }

 //! category controller
    function view(){
    return view('Backend.Category.index');
    }

    function insertCategory(Request $request){
    // Category Validate
    $request->validate([
        'title' => 'required|unique:categories,title',
        'slug' => 'required|unique:categories,slug',
    ]);

        $imagestore = $this->ImageStor($request);
    // Data store on data base
        $categories = new Category();
        $categories = $this->dataStore($request,$categories , $imagestore);
        return redirect()->route('category.all')->with('success', 'Category Add Successfully');
    }
    function allCategory(){
        $categories = Category::select('id','title' , 'image_url')->get();
        return view('Backend.Category.all_category', compact('categories'));
     }

    function editCategory(Category $categories){
        return view('Backend.Category.edit', compact('categories'));
    }




    function updateCategory(Request $request, Category $categories){
        // validation
        $request->validate([
            'title' => 'required|unique:categories,title,'. $categories->id,
            'slug' => 'required|unique:categories,slug,'. $categories->id,
        ]);
        $path = 'Image/' . $categories->image;
        if($request->hasFile('category_image')){
            $this->imageDelete($categories);
            $imagestore = $this->ImageStor($request);
            $dataStore = $this->dataStore($request,$categories,$imagestore);
        }else{
            $dataStore = $this->dataStore($request,$categories);
        }
        return redirect()->route('category.all')->with('success', 'Category Updated Successfully');
    }
    function deleteCategory(Category $categories){
        $isDelete = $this->imageDelete($categories);
        if($isDelete){
            $categories->delete();
        }
        return redirect()->route('category.all')->with('deletesuccess', 'Category delete Successfully');
    }

    function statusUpdate(Category $categories){
        if($categories->status == 0){
            $categories->update([
                'status' => $categories->status = 1,
            ]);
        }else{
            $categories->update([
                'status' => $categories->status = 0,
            ]);
        }

        return back()->with('success', 'you status update successfully');
    }
}
