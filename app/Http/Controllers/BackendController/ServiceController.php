<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function allService()
    {
        $services = Service::all();
        return view('Backend.service.all', compact('services'));
    }

    public function view()
    {
        return view('Backend.service.index');
    }

    public function insert(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric',
        ]);
        $imagePath = $request->file('image')->store('services', 'public');

        Service::create([
            'name' => $request->name,
            'image' => $imagePath,
            'price' => $request->price,
        ]);

        return redirect()->route('service.all')->with('success', 'Service created successfully.');
    }

    public function editService(Service $service)
    {
        return view('Backend.service.edit', compact('service'));
    }

    public function updateService(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($service->image);
            $service->image = $request->file('image')->store('services', 'public');
        }

        $service->update($request->only('name', 'price', 'image'));

        return redirect()->route('service.all')->with('success', 'Service updated successfully.');
    }

    public function delete(Service $service)
    {
        Storage::disk('public')->delete($service->image);
        $service->delete();

        return redirect()->route('service.all')->with('success', 'Service deleted successfully.');
    }
}
