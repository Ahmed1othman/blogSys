<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::select()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.category.index',compact('categories'));
    }

    public function add(){
        return view('admin.pages.category.create');
    }

    public function store(CategoryRequest $request){
            $category = Category::create([
                'category_en'=>$request->category_en,
                'category_ar'=>$request->category_ar,
            ]);
        toastr()->success('Category Added Successfully');
            return redirect()->route('admin.category.index');
    }



    public function edit($id){
        $category = Category::find($id);
        return view('admin.pages.category.edit',compact('category'));
    }

    public function update(CategoryRequest $request,$id){

        $category = Category::find($id);

        $category->update([
            'category_en'=>$request->category_en,
            'category_ar'=>$request->category_ar,
        ]);

        toastr()->success('Category Updated Successfully');
        return redirect()->route('admin.category.index');
    }


    //archive Category
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        toastr()->info('Category archived Successfully');
        return redirect()->route('admin.category.index');
    }

    //archive Category
    public function destroy($id){
        $category = Category::find($id);
        $category->forceDelete();
        toastr()->warning('Category deleted Successfully');
        return redirect()->route('admin.category.index');
    }

    public function archive(){
        $categories = Category::onlyTrashed()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.category.archive',compact('categories'));
    }

    public function unDelete($id){
        Category::withTrashed()
            ->where('id', $id)
            ->restore();
        toastr()->info('Category restored Successfully');
        return redirect()->route('admin.category.index');
    }

}
