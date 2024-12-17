<?php

namespace Modules\Product\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;
use Modules\Manufacturer\Models\Manufacturer;
use Modules\Warehouses\Models\Warehouse;

class Product extends Model
{
    use Compoships;

    protected $table = 'oc_product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_id', 'model', 'location', 'quality', 'quantity','image', "episode_duration", "manufacturer_id",
        'status', 'viewed', 'parent_id', 'org_id', 'video', 'user_id', "warning", "year_manufacture", "type_movie"
    ]; //use :create, :update no use :insert

    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';
    public const LIMIT_AJAX = 100;
    public const PARENT_DEFAULT = 0;

    public const EXTENSIONS = [
        'latest' => 'Mới nhất',
        'oldest' => 'Cũ nhất',
        'bestseller' => 'Bán chạy nhất',
        'special' => 'Khuyến mãi',
        'featured' => 'Nổi bật',
        'mostviewed' => 'Xem nhiều nhất',
        'mostordered' => 'Được đặt nhiều nhất',
        'mostliked' => 'Được yêu thích nhiều nhất',
        'mostcommented' => 'Được bình luận nhiều nhất',
        'mostrated' => 'Được đánh giá nhiều nhất',
        'custom' => 'Tùy chỉnh',
        'category' => 'Danh mục',
    ];

    public function description()
    {
        $description = $this->hasOne(Description::class, 'product_id', 'product_id');

        if ($this->parent_id > 0) {
            $description = $this->hasOne(Description::class, 'product_id', 'parent_id');
        }

        return $description;
    }

    public function descriptionQuery()
    {
        $description = Product::leftJoin('oc_product_description', function ($join) {
            $join->on('oc_product.product_id', '=', 'oc_product_description.product_id')->on('oc_product.product_id', '=', 'oc_product_description.product_id');
        })->select('oc_product_description.*')->first();

        return $description;
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'product_id', 'product_id')->orderBy('episode', 'asc');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'product_id', 'product_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'product_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'product_id', 'product_id');
    }

    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    public function variantsProduct()
    {
        return $this->hasMany(Product::class, 'parent_id', 'product_id');
    }

    public function variants()
    {
        return $this->where('parent_id', $this->product_id)->get();
    }
}
