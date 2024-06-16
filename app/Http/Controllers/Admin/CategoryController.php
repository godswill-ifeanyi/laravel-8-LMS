<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request) {
        $validatedData = $request->validated();

        $category = new Category;

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['name']);
        $category->description = $validatedData['description'];

        if ($request->hasfile('image')) {
            $file = $validatedData['image'];
            $filename = uniqid() .'.'. $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image_path = $filename;
        }

        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect('admin/categories')->with('message', 'Category Added Successfully');
    }

    public function edit($category_id) {
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id) {
        $validatedData = $request->validate([
            'name' => ['required','string','max:200'],
            'slug' => ['nullable','string','max:200'],
            'description' => ['required'],
            'image' => ['nullable','mimes:jpg,png,jpeg'],
            'status' => ['nullable'],
        ]); 

        $category = Category::find($category_id);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['name']);
        $category->description = $validatedData['description'];

        if ($request->hasfile('image')) {
            $destination = 'uploads/category/'.$category->image_path;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $validatedData['image'];
            $filename = uniqid() .'.'. $file->getClientOriginalExtension();
            $file->move(public_path('uploads/category/'), $filename);
            $category->image_path = $filename;
        }

        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        $category->update();

        return redirect('admin/categories')->with('message', 'Category Updated Successfully');
    }

    public function destroy(Request $request) {
        $category = Category::find($request->category_id);
        
        if ($category) {
            $destination = 'uploads/category/'.$category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
             
            $category->delete();

            return redirect('admin/categories')->with('message', 'Category And All Associated Courses Deleted Successfully');
        } else {
            return redirect('admin/categories')->with('message', 'No Category Found');
        }
    }
}
