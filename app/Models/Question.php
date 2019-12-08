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

/**
 * ワード部分一致検索
 *
 * @param [type] $query
 * @param [type] $searchWord
 * @return void
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
     * @param [type] $query
     * @param [type] $categoryId
     * @return void
     */
    public function scopeSearchCategory($query, $searchCategory)
    {
        if (!empty($searchCategory)) {
            return $query->where('tag_category_id', $searchCategory);
        }
    }

}

