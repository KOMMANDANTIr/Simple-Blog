<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_slug' , 'category_name' , 'category_image'];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
