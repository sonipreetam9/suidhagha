<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategorieModel;
class SubCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'sub_category';
    protected $fillable = ['name','category_id','logo'];

    public function category()
    {
        return $this->belongsTo(CategorieModel::class, 'category_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(ProductModel::class, 'sub_category_id');
    }
 

}
