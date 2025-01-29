<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\logo;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    function view(){
         return view('Backend.Nav.nav_item');
    }

    function allNav(){
        $menus = Menu::simplePaginate(10);
        return view('Backend.Nav.all_nav', compact('menus'));
    }

    function datastore($request, $menus){
        $menus->title = $request->title;
        $menus->slug =  empty($request->slug) ? Str::slug($request->title) : Str::slug($request->slug);
        $menus->save();
    }

    function insertNav(Request $request){
        $request->validate([
            'title' => 'required',
            'slug' => 'unique:menus,slug'
        ]);
        $menus = new Menu();
        $this->datastore($request,$menus);
        return redirect()->route('menu.all')->with('success', 'Menu Add Successfully');
    }


    function editMenu(Menu $menus){
        return view('Backend.Nav.edit_nav' ,compact('menus'));
    }

    function updateNav(Request $request, Menu $menus){
        $request->validate([
            'title' => 'required',
            'slug' => 'unique:menus,slug,'. $menus->id,
        ]);
        $this->datastore($request,$menus);
        return redirect()->route('menu.all')->with('warning', 'Menu update Successfully');

    }

    function deleteNav(Menu $menus){
        $menus->delete();
        return redirect()->route('menu.all')->with('deletesuccess', 'Category delete Successfully');
    }

    function viewlogo(){

        $logos = logo::first();

        if($logos){
            return view('Backend.Nav.nav_logo', compact('logos'));
        }else{
            return view('Backend.Nav.logo');
        }

    }


    function imagestore($request){
        $exten  = $request->logo->extension();
        $name = 'logo-' . uniqid() . '.' . $exten;
        $path = $request->logo->storeAs('Image', $name, 'public');
        $img_url = env('APP_URL')  .Storage::url($path);

        return[
            'logo' => $name,
            'logo_url' =>$img_url
        ];
    }

    function storelogo(Request $request){



        $image = $this->imagestore($request);
        $logo = new logo();
        $logo->logo = $image['logo'];
        $logo->logo_url =$image['logo_url'];
        $logo->save();
        return redirect()->route('logo.view');
    }

    function updatelogo(Request $request, logo $logo){

        $path = 'Image/' . $logo->logo;
        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }


        $image = $this->imagestore($request);
        $logo->logo = $image['logo'];
        $logo->logo_url =$image['logo_url'];
        $logo->save();
        return redirect()->route('logo.view');



    }

}
