<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    function view(){
        $socials = Social::first();

        if($socials){
            return view('Backend.SocialMedia.edit', compact('socials'));
        }else{
            return view('Backend.SocialMedia.index');
        }
    }
    function datastore($request,$socials){
        $socials->facebook = $request->fb_link;
        $socials->messanger = $request->msg_link;
        $socials->whatsapp = $request->wts_link;
    }

    function insert(Request $request){
        $request->validate([
            'fb_link' => 'required',
            'msg_link' => 'required',
            'wts_link' => 'required|max_digits:10|min_digits:10',
        ]);
        $socials = new Social();
        $this->datastore($request,$socials);
        $socials->save();
        return redirect()->route('social.update' , $socials->id)->with('success', 'your Social Media link insert successfully!');
    }
    function update(Request $request, Social $socials){
        // $request->validate([
        //     'fb_link' => 'required,'. $socials->id ,
        //     'msg_link' => 'required,'. $socials->id ,
        //     'wts_link' => 'required|max_digits:10|min_digits:10,'.  $socials->id,
        // ]);

        $this->datastore($request,$socials);
        $socials->save();
        return back()->with('warning', 'your Social Media link insert successfully!');


    }

}
