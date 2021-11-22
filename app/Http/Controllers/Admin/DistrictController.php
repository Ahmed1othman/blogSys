<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DistrictRequest;
use App\Models\Admin\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(){
        $districts = District::select()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.district.index',compact('districts'));
    }

    public function add(){
        return view('admin.pages.district.create');
    }

    public function store(DistrictRequest $request){
        $district = District::create([
            'district_en'=>$request->district_en,
            'district_ar'=>$request->district_ar,
        ]);
        toastr()->success('district Added Successfully');
        return redirect()->route('admin.district.index');
    }



    public function edit($id){
        $district = District::find($id);
        return view('admin.pages.district.edit',compact('district'));
    }

    public function update(DistrictRequest $request,$id){

        $district = District::find($id);

        $district->update([
            'district_en'=>$request->district_en,
            'district_ar'=>$request->district_ar,
        ]);

        toastr()->success('district Updated Successfully');
        return redirect()->route('admin.district.index');
    }


    //archive district
    public function delete($id){
        $district = District::find($id);
        $district->delete();
        toastr()->info('district archived Successfully');
        return redirect()->route('admin.district.index');
    }

    //archive district
    public function destroy($id){
        $district = District::find($id);
        $district->forceDelete();
        toastr()->warning('district deleted Successfully');
        return redirect()->route('admin.district.index');
    }

    public function archive(){
        $districts = District::onlyTrashed()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.district.archive',compact('districts'));
    }

    public function unDelete($id){
        district::withTrashed()
            ->where('id', $id)
            ->restore();
        toastr()->info('district restored Successfully');
        return redirect()->route('admin.district.index');
    }

}
