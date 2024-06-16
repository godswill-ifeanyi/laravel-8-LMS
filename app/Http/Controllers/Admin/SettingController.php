<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index() {
        $setting = Setting::find(1);
        return view('admin.setting.index', compact('setting'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'website_name' => 'required|string|max:255',
            'website_currency' => 'required',
            'website_logo' => 'nullable',
            'website_favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable'
        ]);


        $setting = Setting::where('id','1')->first();

        if ($setting) {
            
            $setting->website_name = $validatedData['website_name'];
            $setting->url = $setting->url;
            $setting->currency = $validatedData['website_currency'];

            if ($request->hasfile('website_logo')) {
                $destination = 'uploads/setting/'.$setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $validatedData['website_logo'];
                $filename = uniqid() .'.'. $file->getClientOriginalExtension();
                $file->move('uploads/setting/', $filename);
                $setting->logo = $filename;
            }

            if ($request->hasfile('website_favicon')) {
                $destination = 'uploads/setting/'.$setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $validatedData['website_favicon'];
                $filename = uniqid() .'.'. $file->getClientOriginalExtension();
                $file->move('uploads/setting/', $filename);
                $setting->favicon = $filename;
            }

            $setting->description = $validatedData['description'];
            $setting->meta_title = $validatedData['website_name'];
            $setting->meta_description = $validatedData['meta_description'];
            $setting->meta_keywords = $validatedData['meta_keywords'];
            $setting->update();

            return redirect('admin/settings')->with('message', 'Settings Updated!');
        } else {
            $setting = new Setting;
            $setting->website_name = $validatedData['website_name'];
            $setting->url = $_SERVER['SERVER_NAME'];
            $setting->currency = $validatedData['website_currency'];

            if ($request->hasfile('website_logo')) {
                $file = $request->file('website_logo');
                $filename = uniqid() .'.'. $file->getClientOriginalExtension();
                $file->move('uploads/setting/', $filename);
                $setting->logo = $filename;
            }

            if ($request->hasfile('website_favicon')) {
                $file = $request->file('website_favicon');
                $filename = uniqid() .'.'. $file->getClientOriginalExtension();
                $file->move('uploads/setting/', $filename);
                $setting->favicon = $filename;
            }

            $setting->description = $validatedData['description'];
            $setting->meta_title = $validatedData['website_name'];
            $setting->meta_description = $validatedData['meta_description'];
            $setting->meta_keywords = $validatedData['meta_keywords'];
            $setting->save();

            return redirect('admin/settings')->with('message', 'Settings Added!');
        }
    }
}
