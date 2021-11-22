<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Admin\Category;
use App\Models\Admin\District;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function index(){
        $posts = Post::select()->with('user','category','district')->orderBy('id','desc')->paginate(2);
        return view('admin.pages.post.index',compact('posts'));
    }

    public function add(){
        $categories = Category::get();
        $districts = District::get();
        return view('admin.pages.post.create',compact('categories','districts'));
    }

    public function store(PostRequest $request){

        try {
            $image = $request->image;
            $image_one= null;
            if($image){
                $image_one = uniqid().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(500,300)->save('images/postimg/'.$image_one);

            }
            $post = Post::create([
                'category_id'=>$request->category_id,
                'district_id'=>$request->district_id,
                'subdistrict_id'=>$request->subdistrict_id,
                'subcategory_id'=>$request->subcategory_id,
                'user_id'=>Auth::id(),
                'title_en'=>$request->title_en,
                'title_ar'=>$request->title_ar,
                'image'=>'images/postimg/'.$image_one,
                'details_en'=>$request->details_en,
                'details_ar'=>$request->details_ar,
                'tags_en'=>$request->tags_en,
                'tags_ar'=>$request->tags_ar,
                'headline'=>$request->headline,
                'first_section'=>$request->first_section,
                'first_section_thumbnail'=>$request->first_section_thumbnail,
                'bigthumbnail'=>$request->bigthumbnail,
                'post_date'=>date('d-m-Y'),
                'post_month'=>date('F'),
            ]);
            toastr()->success('Post Added Successfully');
            return redirect()->route('admin.post.index');
        }catch(\Exception $ex){
            return $ex;
        }



    }



    public function edit($id){

        $posts = Post::find($id);
        $categories = Category::get();
        $districts = District::get();
        return view('admin.pages.post.edit',compact('posts','categories','districts'));
    }

    public function update(PostRequest $request,$id){

        DB::beginTransaction();
        $post = Post::find($id);
        if(!$request->has('headline')){
            $request->request->add([
                'headline'=>0
            ]);
        }
        if(!$request->has('first_section')){
            $request->request->add([
                'first_section'=>0
            ]);
        }
        if(!$request->has('first_section_thumbnail')){
            $request->request->add([
                'first_section_thumbnail'=>0
            ]);
        }

        if(!$request->has('bigthumbnail')){
            $request->request->add([
                'bigthumbnail'=>0
            ]);
        }
        $old_image = $request->old_image;
        try {
            DB:
            $image = $request->image;
            $image_one= null;
            if($image){
                $image_one = uniqid().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(500,300)->save('images/postimg/'.$image_one);
                $post->update([
                    'category_id'=>$request->category_id,
                    'district_id'=>$request->district_id,
                    'subdistrict_id'=>$request->subdistrict_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'title_en'=>$request->title_en,
                    'title_ar'=>$request->title_ar,
                    'image'=>'images/postimg/'.$image_one,
                    'details_en'=>$request->details_en,
                    'details_ar'=>$request->details_ar,
                    'tags_en'=>$request->tags_en,
                    'tags_ar'=>$request->tags_ar,
                    'headline'=>$request->headline,
                    'first_section'=>$request->first_section,
                    'first_section_thumbnail'=>$request->first_section_thumbnail,
                    'bigthumbnail'=>$request->bigthumbnail,
                ]);
                if (Storage::exists(asset($old_image))){
                    unlink($old_image);
                    return 'done';
                }
            }else{
                $post->update([
                    'category_id'=>$request->category_id,
                    'district_id'=>$request->district_id,
                    'subdistrict_id'=>$request->subdistrict_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'title_en'=>$request->title_en,
                    'title_ar'=>$request->title_ar,
                    'image'=>$old_image,
                    'details_en'=>$request->details_en,
                    'details_ar'=>$request->details_ar,
                    'tags_en'=>$request->tags_en,
                    'tags_ar'=>$request->tags_ar,
                    'headline'=>$request->headline,
                    'first_section'=>$request->first_section,
                    'first_section_thumbnail'=>$request->first_section_thumbnail,
                    'bigthumbnail'=>$request->bigthumbnail,
                ]);
            }
            DB::commit();

        }catch(\Exception $ex){
            DB::rollBack();
            return $ex;
        }

        toastr()->success('Post Updated Successfully');
        return redirect()->route('admin.post.index');
    }


    //archive Post
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        toastr()->info('Post archived Successfully');
        return redirect()->route('admin.post.index');
    }

    //archive Post
    public function destroy($id){
        $post = Post::find($id);
        $post->forceDelete();
        toastr()->warning('Post deleted Successfully');
        return redirect()->route('admin.post.index');
    }

    public function archive(){
        $posts = Post::onlyTrashed()->orderBy('id','desc')->paginate(2);
        return view('admin.pages.post.archive',compact('posts'));
    }

    public function unDelete($id){
        Post::withTrashed()
            ->where('id', $id)
            ->restore();
        toastr()->info('Post restored Successfully');
        return redirect()->route('admin.post.index');
    }

}
