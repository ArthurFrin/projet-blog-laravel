<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Update an article with its category
     *
     * @param array $attributes
     * @return bool
     */
    public function updateWithCategory(array $attributes)
    {
        // Update article attributes
        $this->fill($attributes);
        
        // Save the article with its category
        return $this->save();
    }
}
