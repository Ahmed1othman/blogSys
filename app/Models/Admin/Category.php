<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'category_en',
        'category_ar',
    ];

    public $timestamps = true;


    //relations
    public function subcategory(){
        return $this->hasMany('App\Models\Admin\SubCategory','category_id','id');
    }

    public function posts(){
        return $this->hasMany('App\Models\Admin\Post','category_id','id');
    }


}
