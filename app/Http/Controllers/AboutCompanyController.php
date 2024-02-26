<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\logo;
class AboutCompanyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $about_company = AboutCompany::first(); // or however you want to get the company data

        return view('about_company', ['about_company' => $about_company]);
    }

    // store or update
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'string',
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'email',
            'about' => 'string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

// make it create only one row





            $about_company = AboutCompany::first();

            if ($about_company) {
                // update the existing row

// make test for the update
//  solve the problem of the logo


                $about_company->update(
                    [
                        'name' => $validatedData['name'],
                        'phone' => $validatedData['phone'],
                        'email' => $validatedData['email'],
                        'about' => $validatedData['about'],

                    ]
                );
                // is the logo updated test it ?

                if ($request->hasFile('logo')) {

                    $logo=   logo::find($about_company->id)->update(['logo' => $request->file('logo')->store('public/img')]);
                }
                else{
                    logo::create(['logo' => $request->file('logo')->store('public/img')]);
                }
            } else {
                // upload image to storage

// create logo based on the about company id
             logo::create(['logo' => $request->file('logo')->store('public/img')]);
                AboutCompany::create([
                    'name' => $validatedData['name'],
                    'phone' => $validatedData['phone'],
                    'email' => $validatedData['email'],
                    'about' => $validatedData['about'],


                ]);
            }
            if($about_company){
                $logo=   logo::find($about_company->id);

 //add message sucess
//  how to perform the test ?
return view('about_company', ['about_company' => $about_company , 'logo'=>$logo])->with('success','تم تحديث البيانات بنجاح');

                }
                else{
                    return redirect()->back()->with('error','حدث خطأ ما');
                }
        }


//

}
















