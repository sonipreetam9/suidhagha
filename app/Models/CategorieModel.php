<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieModel extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'image', 'seq', 'highlight', 'url_link','in_navbar','type'];
    public function category()
    {
        return $this->belongsTo(CategorieModel::class, 'category_id', 'id');
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategoryModel::class, 'category_id', 'id');
    }
}
