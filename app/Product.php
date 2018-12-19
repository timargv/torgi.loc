<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Product extends Model
{
    use NodeTrait;

    public const STATUS_ACTIVE = 'Y';
    public const STATUS_CLOSED = 'N';

    protected $table = 'products';

//    protected $guarded = ['id'];
    protected $fillable = ['title', 'date_expiration', 'unit', 'pcs', 'price', 'parent_id', 'price_two', 'price_three', 'links', 'status', 'user_id', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
