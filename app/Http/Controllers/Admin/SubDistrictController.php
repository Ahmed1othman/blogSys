<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubDistrictRequest;
use App\Models\Admin\District;
use App\Models\Admin\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    public function index(){
        $subcategories = SubDistrict::with('district')->select()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.subdistrict.index',compact('subcategories'));
    }

    public function add(){
        $categories = District::get();
        return view('admin.pages.subdistrict.create',compact('categories'));
    }

    public function store(SubDistrictRequest $request){
        $subdistrict = SubDistrict::create([
            'subdistrict_en'=>$request->subdistrict_en,
            'subdistrict_ar'=>$request->subdistrict_ar,
            'district_id'=>$request->district_id,
        ]);
        toastr()->success('SubDistrict Added Successfully');
        return redirect()->route('admin.subdistrict.index');
    }



    public function edit($id){
        $subdistrict = SubDistrict::find($id);
        $categories = District::get();
        return view('admin.pages.subdistrict.edit',compact('subdistrict','categories'));
    }

    public function update(SubDistrictRequest $request,$id){

        $subdistrict = SubDistrict::find($id);

        $subdistrict->update([
            'subdistrict_en'=>$request->subdistrict_en,
            'subdistrict_ar'=>$request->subdistrict_ar,
        ]);

        toastr()->success('SubDistrict Updated Successfully');
        return redirect()->route('admin.subdistrict.index');
    }


    //archive SubDistrict
    public function delete($id){
        $subdistrict = SubDistrict::find($id);
        $subdistrict->delete();
        toastr()->info('SubDistrict archived Successfully');
        return redirect()->route('admin.subdistrict.index');
    }

    //Delete SubDistrict
    public function destroy($id){
        $subdistrict = SubDistrict::find($id);
        $subdistrict->forceDelete();
        toastr()->warning('SubDistrict deleted Successfully');
        return redirect()->route('admin.subdistrict.index');
    }

    public function archive(){
        $subcategories = SubDistrict::onlyTrashed()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.subdistrict.archive',compact('subcategories'));
    }


    // Unarchive SubDistrict
    public function unDelete($id){
        SubDistrict::withTrashed()
            ->where('id', $id)
            ->restore();
        toastr()->info('SubDistrict restored Successfully');
        return redirect()->route('admin.subdistrict.index');
    }

    public function get($id){
        $subdistricts = SubDistrict::where('district_id',$id)->get();
        return $subdistricts;
        return response()->json($subdistricts);
    }

}
