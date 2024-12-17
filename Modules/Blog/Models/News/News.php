<?php

namespace Modules\Blog\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class News extends Model
{
    use HasFactory;

    protected $table = 'oc_news';
    protected $primaryKey = 'news_id';
    protected $fillable = ['image', 'sort_order', 'status', 'viewed', 'org_id', 'view', 'user_id']; //use :create, :update no use :insert

    public $timestamps = true;
    public const CREATED_AT = 'date_added';
    public const UPDATED_AT = 'date_modified';

    public const EXTENSIONS = [
        'lastest' => 'Mới nhất',
        'oldest' => 'Cũ nhất',
        'most_viewed' => 'Xem nhiều nhất',
        'category' => 'Danh mục',
        'custom' => 'Tùy chỉnh',
    ];

    public function description()
    {
        return $this->belongsTo(Description::class, 'news_id', 'news_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'news_id', 'news_id');
    }

    public function category()
    {
        $category = implode(', ', $this->categories->pluck('category.description.name')->toArray());

        return $category;
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
