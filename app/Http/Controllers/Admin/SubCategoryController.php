<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories = SubCategory::with('category')->select()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.subcategory.index',compact('subcategories'));
    }

    public function add(){
        $categories = Category::get();
        return view('admin.pages.subcategory.create',compact('categories'));
    }

    public function store(SubCategoryRequest $request){
        $subcategory = SubCategory::create([
            'subcategory_en'=>$request->subcategory_en,
            'subcategory_ar'=>$request->subcategory_ar,
            'category_id'=>$request->category_id,
        ]);
        toastr()->success('SubCategory Added Successfully');
        return redirect()->route('admin.subcategory.index');
    }



    public function edit($id){
        $subcategory = SubCategory::find($id);
        $categories = Category::get();
        return view('admin.pages.subcategory.edit',compact('subcategory','categories'));
    }

    public function update(SubCategoryRequest $request,$id){

        $subcategory = SubCategory::find($id);

        $subcategory->update([
            'subcategory_en'=>$request->subcategory_en,
            'subcategory_ar'=>$request->subcategory_ar,
        ]);

        toastr()->success('SubCategory Updated Successfully');
        return redirect()->route('admin.subcategory.index');
    }


    //archive SubCategory
    public function delete($id){
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        toastr()->info('SubCategory archived Successfully');
        return redirect()->route('admin.subcategory.index');
    }

    //Delete SubCategory
    public function destroy($id){
        $subcategory = SubCategory::find($id);
        $subcategory->forceDelete();
        toastr()->warning('SubCategory deleted Successfully');
        return redirect()->route('admin.subcategory.index');
    }

    public function archive(){
        $subcategories = SubCategory::onlyTrashed()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.subcategory.archive',compact('subcategories'));
    }


    // Unarchive SubCategory
    public function unDelete($id){
        SubCategory::withTrashed()
            ->where('id', $id)
            ->restore();
        toastr()->info('SubCategory restored Successfully');
        return redirect()->route('admin.subcategory.index');
    }

    //get all subcategory in a category
    public function get($id){
        $subcategories = SubCategory::where('category_id',$id)->get();
        return response()->json($subcategories);
    }
}
