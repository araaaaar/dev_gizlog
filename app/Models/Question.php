<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'tag_category_id',
        'title',
        'content',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tegCategory()
    {
        return $this->belongsTo('App\Models\TagCategory', 'tag_category_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

/**
 * ワード部分一致検索
 *
 * @param $query Builder object
 * @param $searchWord string
 * @return Illuminate\Database\Eloquent\Builder
 */
    public function scopeSearchWord($query, $searchWord)
    {
        if (!empty($searchWord)) {
            return $query->where('title', 'LIKE', '%'.$searchWord.'%');
        }
    }

    /**
     * カテゴリー完全一致検索
     *
     * @param $query Builder object
     * @param $categoryId string
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchCategory($query, $searchCategory)
    {
        if (!empty($searchCategory)) {
            return $query->where('tag_category_id', $searchCategory);
        }
    }

}

