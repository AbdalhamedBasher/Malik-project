<?php

namespace App\Http\Controllers;
use App\Models\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function index()
    {
        return view('logos');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'logo' => 'required|file|image|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'about' => 'nullable|string|max:500',
        ]);

        $path = $request->file('logo')->store('public/logos');

        logo::create([
            'logo' => $path,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'about' => $request->about,
        ]);


        // Save the path to the logo in your database, etc.

        return back()->with('success', 'Logo uploaded successfully.');
    }
}
