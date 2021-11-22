<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'subcategory_en',
        'subcategory_ar',
        'category_id',
    ];

    public $timestamps = true;

    //relations
    public function category(){
        return $this->belongsTo('App\Models\Admin\Category','category_id','id');
    }

    public function posts(){
        return $this->hasMany('App\Models\Admin\Post','subcategory_id','id');
    }


}
