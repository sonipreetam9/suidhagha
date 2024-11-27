<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeMainBannerModel extends Model
{
    use HasFactory;
    protected $table = 'home_main_banner';
    protected $fillable = ['title','sub_title','image','paragraph','category_id','type'] ;
    public function category()
    {
        return $this->belongsTo(CategorieModel::class, 'category_id');
    }
}
