<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    //
    use SoftDeletes;
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'reporting_time',
        'title',
        'content',
    ];

    // public function getByUserId($id)
    // {
    //     return $this->where('user_id', $id)->get();
    // }
}
