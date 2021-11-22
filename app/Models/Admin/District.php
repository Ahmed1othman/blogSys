<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'district_en',
        'district_ar',
    ];

    public $timestamps = true;


    //relations
    public function subdistrict(){
        return $this->hasMany('App\Models\Admin\SubDistrict','district_id','id');
    }
    public function posts(){
        return $this->hasMany('App\Models\Admin\Post','district_id','id');
    }



}
