<?php

namespace App\Http\Controllers\BackendController;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CompanyInfoController extends Controller
{
    public function index()
    {

        $companyInfo = CompanyInfo::first();



            return view('Backend.CompanyInfo.add', compact('companyInfo'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'details' => 'required|string',
            'address' => 'required|string',
            'address_map_link' => 'required|url',
        ]);

        CompanyInfo::create($request->all());

        return redirect()->route('company.info.index')->with('success', 'Information added successfully!');
    }

    public function update(Request $request, CompanyInfo $companyInfo)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'details' => 'required|string',
            'address' => 'required|string',
            'address_map_link' => 'required|url',
        ]);

        $companyInfo->update($request->all());
        
        return redirect()->route('company.info.index')->with('success', 'Information updated successfully!');
    }
}
