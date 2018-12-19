<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    //
    use NodeTrait;

    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = ['name', 'number', 'slug', 'parent_id', 'date_expiration', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
