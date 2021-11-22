<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubDistrict extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'subdistrict_en',
        'subdistrict_ar',
        'district_id',
    ];

    public $timestamps = true;

    //relations
    public function district(){
        return $this->belongsTo('App\Models\Admin\District','district_id','id');
    }

    public function posts(){
        return $this->belongsTo('App\Models\Admin\Post','subdistrict','id');
    }
}
