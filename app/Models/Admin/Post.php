<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'category_id',
        'district_id',
        'subcategory_id',
        'subdistrict_id',
        'user_id',
        'title_en',
        'title_ar',
        'tags_en',
        'tags_ar',
        'image',
        'details_en',
        'details_ar',
        'headline',
        'first_section',
        'first_section_thumbnail',
        'bigthumbnail',
        'post_date',
        'post_month',
    ];

    public $timestamps = true;


    //relations
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Admin\Category','category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo('App\Models\Admin\SubCategory','subcategory_id','id');
    }
    public function district(){
        return $this->belongsTo('App\Models\Admin\District','district_id','id');
    }

    public function subdistrict(){
        return $this->belongsTo('App\Models\Admin\SubDistrict','subdistrict_id','id');
    }

}
