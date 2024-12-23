<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeMiddleBannerModel extends Model
{
    use HasFactory;
    protected $table = 'home_middle_banner';
    protected $fillable = [
        'image',
        'discount',
        'title',
        'sub_title',
        'category_id',
    ] ;
    public function category()
    {
        return $this->belongsTo(CategorieModel::class, 'category_id');
    }
}
